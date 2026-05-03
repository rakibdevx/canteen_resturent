<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpEmail;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Traits\CartTrait;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Controllers\Traits\OrderNumberGeneratorTrait;
use App\Http\Controllers\Traits\MainSiteViewSharedDataTrait;



class RiderController extends Controller
{


    use CartTrait;
    use MainSiteViewSharedDataTrait;
    use OrderNumberGeneratorTrait;


    public function __construct()
    {
        $this->shareMainSiteViewData();
    }

    public function orders($filter = 'all')
    {
        $user = Auth::user();

        $allowedFilters = ['all', 'pending', 'completed', 'cancelled'];

        if (!in_array($filter, $allowedFilters)) {
            $filter = 'all';
        }

        $ordersQuery = Order::where('rider_id', $user->id)
            ->with('orderItems');

        if ($filter !== 'all') {
            $ordersQuery->where('status', $filter);
        }

        $orders = $ordersQuery->orderBy('created_at', 'desc')->get();

        return view('rider.orders', compact('user', 'orders', 'filter'));
    }


   public function orderDetails($id)
    {
        $user = Auth::user();

        $order = \App\Models\Order::where('id', $id)
            ->where('rider_id', $user->id)
            ->with(['orderItems', 'deliveryAddressWithTrashed', 'pickupAddress'])
            ->firstOrFail();

        return view('rider.order-details', compact('user', 'order'));
    }

    // Show the rider account
    public function account()
    {
        $user = Auth::User();
        return view('rider.account', compact('user'));
    }




        public function editAccount()
    {
        $user = Auth::User();
        return view('rider.edit-account', compact('user'));
    }

    public function updateAccount(UpdateProfileRequest $request)
    {
        $user = Auth::User();
        $validated = $request->validated();

        $user->first_name = $validated['first_name'];
        $user->middle_name = $validated['middle_name']; // Optional, so it can be null
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->phone_number = $validated['phone_number'];
        $user->address = $validated['address'];

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old profile photo if exists
            if ($user->profile_picture) {
                Storage::delete('profile-picture/' . $user->profile_picture);
            }

            // Store new profile photo
            $photoPath = $request->file('profile_photo')->store('profile-picture', 'public');
            $user->profile_picture = basename($photoPath);
        }

        // Save the updated user data
        $user->save();

        // Return success message
        return redirect()->route('rider.account')->with('success', 'Profile updated successfully.');
    }


    public function showChangePasswordForm()
    {
        $user = Auth::User();

        return view('rider.change-password', compact('user'));
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::User();

        // Check if the current password matches the user's password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Send password changed notification email
        Mail::to($user->email)->send(new PasswordChangedNotification($user));

        return redirect()->route('admin.dashboard')->with('success', 'Your password has been successfully updated.');
    }


    public function otp($id)
    {
        $order = Order::findOrFail($id);

        $otp = random_int(1000, 9999);

        $order->otp = $otp;
        $order->otp_expire = now()->addMinutes(5);
        $order->save();

        try {
            Mail::to($order->customer->email)
                ->send(new OtpEmail(
                    $order->customer,
                    $otp,
                    $order->order_no
                ));
        } catch (\Exception $e) {
            \Log::error('Order OTP email failed: ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to send OTP'
            ], 500);
        }

        // ✅ IMPORTANT: JSON return
        return response()->json([
            'message' => 'OTP sent successfully',
            'order_id' => $order->id
        ]);
    }

    public function order_confirm(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        if($order->status == "cancelled")
        {
             return back()->with('danger', 'Order Already Cancelled');
        }

        if (now()->gt($order->otp_expire)) {
            return response()->json([
                'message' => 'OTP expired'
            ], 400);
        }

        if ($order->otp == $request->otp) {

            $order->update([
                'status' => 'completed',
                'status_online_pay' => 'paid' ,
                'otp' => null,
                'otp_expire' => null
            ]);

            return response()->json([
                'message' => 'Delivery confirmed successfully'
            ]);
        }

        return response()->json([
            'message' => 'Invalid OTP'
        ], 400);
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'cancelled',
        ]);
         return back()->with('success', 'Order cancelled successfully');
    }
}