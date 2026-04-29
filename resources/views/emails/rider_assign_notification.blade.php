<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Assigned</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            border: 1px solid #ddd;
            overflow: hidden;
        }

        .header {
            background: #000;
            text-align: center;
            padding: 15px;
        }

        .header img {
            max-width: 140px;
        }

        .content {
            padding: 20px;
        }

        h2 {
            color: #0056b3;
            margin-top: 0;
        }

        .badge {
            display: inline-block;
            background: #28a745;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            margin: 10px 0;
        }

        .box {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #eee;
            margin-top: 15px;
        }

        .box table {
            width: 100%;
            font-size: 14px;
        }

        .box td {
            padding: 6px 0;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            padding: 15px;
        }

        .alert {
            background: #ffc107;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 14px;
        }

    </style>
</head>
<body>

<div class="container">

    <!-- Logo -->
    <div class="header">
        <img src="{{ config('site.url').'assets/images/logo_light.png' }}" alt="Logo">
    </div>

    <div class="content">

        <!-- Greeting -->
        <h2>Hi {{ $rider->first_name }},</h2>

        <p><strong>{{ config('site.name') }}</strong> has assigned you a new order.</p>

        <!-- Order Badge -->
        <div class="badge">
            Order #{{ $order->order_no }}
        </div>

        <!-- Order Info -->
        <div class="box">
            <table>
                <tr>
                    <td><strong>Order No:</strong></td>
                    <td>#{{ $order->order_no }}</td>
                </tr>

                <tr>
                    <td><strong>Total Amount:</strong></td>
                    <td>
                        {!! config('site.currency_symbol') !!}
                        {{ number_format($order->total_price + ($order->delivery_fee ?? 0), 2) }}
                    </td>
                </tr>

                <tr>
                    <td><strong>Delivery Fee:</strong></td>
                    <td>
                        {!! config('site.currency_symbol') !!} {{ $order->delivery_fee ? number_format($order->delivery_fee, 2) : 'N/A' }}
                    </td>
                </tr>

                <tr>
                    <td><strong>Payment Method:</strong></td>
                    <td>{{ $order->payment_method }}</td>
                </tr>

                <tr>
                    <td><strong>Status:</strong></td>
                    <td>{{ ucfirst($order->status) }}</td>
                </tr>
            </table>
        </div>

        <!-- Customer Info -->
        @if($order->customer)
        <div class="box">
            <strong>Customer Information</strong>
            <table>
                <tr>
                    <td>Name:</td>
                    <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>{{ $order->customer->phone_number }}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $order->customer->email }}</td>
                </tr>
            </table>
        </div>
        @endif

        <!-- Address -->
        <div class="box">
            <strong>Delivery Details</strong>

            @if($order->order_type === 'pickup' && $order->pickupAddress)
                <p><strong>Pickup Location:</strong><br>
                {{ $order->pickupAddress->full_address }}</p>
            @elseif($order->deliveryAddressWithTrashed)
                <p><strong>Delivery Address:</strong><br>
                {{ $order->deliveryAddressWithTrashed->full_address }}</p>
            @else
                <p>No address available</p>
            @endif
        </div>

        <!-- Alert -->
        <div class="alert">
            Please deliver this order on time. Contact support if needed.
        </div>

        <!-- Footer note -->
        <p style="margin-top:20px;">
            Need help? Contact:
            <a href="mailto:{{ config('site.email') }}">
                {{ config('site.email') }}
            </a>
        </p>

    </div>

    <div class="footer">
        © {{ date('Y') }} {{ config('site.name') }} — All rights reserved
    </div>

</div>

</body>
</html>