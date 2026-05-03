<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Order;
use App\Mail\OrderEmail;
use App\Models\Customer;
use Stripe\PaymentIntent;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\RestaurantPhoneNumber;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Traits\CartTrait;
use App\Http\Controllers\Traits\MainSiteViewSharedDataTrait;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaymentController extends Controller
{
    use CartTrait;
    use MainSiteViewSharedDataTrait;


    protected $provider;
    protected $stripeSecret;

    public function __construct()
    {
        $this->shareMainSiteViewData();

        $this->provider      = config('payments.provider');
        $this->stripeSecret  = config('payments.stripe.secret'); 

    }

    
 

    public function paymentCancel()
    {
        return view('main-site.payment-cancel');
    }

 

    public function paymentSuccess(Request $request)
    {
        // still run your “wizard” checks if you want
        $this->runAllChecks();

        return match ($this->provider) {
            'stripe'  => $this->handleStripeSuccess($request),
            default   => redirect()->route('menu')->withErrors('Unsupported payment provider.'),
        };
    }
    






    private function handleStripeSuccess(Request $request)
    {
        Stripe::setApiKey($this->stripeSecret);

        $session_id = $request->query('session_id');

        if (!$session_id) {
            return redirect()->route('menu')->withErrors('Session ID not found!');
        }

        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);

            $order_no = $checkout_session->metadata->order_no ?? null;
            if (!$order_no) {
                return redirect()->route('menu')->withErrors('No order reference found.');
            }

            $order = Order::with(['orderItems', 'customer'])
                ->where('order_no', $order_no)
                ->first();

            if (!$order) {
                throw new NotFoundHttpException();
            }

            // Save Stripe session id on the order
            $order->session_id = $session_id;

            if ($order->status_online_pay === 'unpaid') {
                $order->status_online_pay = 'paid';
            }
            $order->save();

            // Send email
            try {
                Mail::to($order->customer->email)->send(new OrderEmail(
                    $order->orderItems,
                    $order->customer->first_name,
                    $order->customer->email,
                    $order->order_no,
                    $order->delivery_fee,
                    $order->total_price,
                    config('site.email'),
                    RestaurantPhoneNumber::first()?->phone_number
                ));
            } catch (\Exception $e) {
                Log::error('Order email failed to send: '.$e->getMessage());
            }


            // Clear session
            $this->clearOrderSession();

            return view('main-site.payment-success', compact('order'));

        } catch (\Exception $e) {
            $error_msg = $e->getMessage();
            return redirect()->route('menu')->withErrors($error_msg);
        }
    }




       protected function checkOrderNo()
    {
        if (!session()->has('order_no')) {
            //return redirect()->route('menu')->withErrors('We could not retrieve your order number. Please try again or contact support if the issue persists.')->send();
            return redirect()->route('menu')->send();
        }
    }


    public function handleStripeWebhook(Request $request)
    {
        $endpoint_secret =  config('services.stripe.webhookkey');
    
        // Retrieve the raw payload
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;
    
    
        try {
            // Verify the event signature
            $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
    
            // Handle specific event types
            if ($event->type === 'checkout.session.completed') {
                $session = $event->data->object;  
     
                $order = Order::with(['orderItems', 'customer'])->where('session_id', $session->id)->first();
                $order->status_online_pay = 'paid';
                $order->payment_method = 'Stripe';
                $order->save();
    
                if ($order->status_online_pay === 'unpaid') {    
                    try {
                        Mail::to($order->customer->email)->send(new OrderEmail(
                            $order->orderItems,
                            $order->customer->name,
                            $order->customer->email,
                            $order->order_no,
                            $order->delivery_fee,
                            $order->total_price,
                            config('site.email'),
                            RestaurantPhoneNumber::first() ? RestaurantPhoneNumber::first()->phone_number : null
                        ));
                    } catch (Exception $e) {
                        Log::error('Order email failed to send: ' . $e->getMessage());
                    }
                                     
                }
     
            }
    
            return response('Webhook handled', 200);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            Log::error('Invalid payload: ' . $e->getMessage());
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            Log::error('Invalid signature: ' . $e->getMessage());
            return response('Invalid signature', 400);
        } catch (Exception $e) {
            // General error
            Log::error('Webhook error: ' . $e->getMessage());
            return response('Webhook error', 500);
        }
    }

    // Call all checks at once
    protected function runAllChecks()
    {
        // $this->checkCart();
        // $this->checkCustomerDetails();
        // $this->checkDeliveryDetails();
        // $this->checkOrderNo();
    }

    protected function clearOrderSession()
    {
        session()->forget([
            'customer',
            'customer_details',
            'delivery_details',
            'order_no'
        ]);
    }
  
    
}
