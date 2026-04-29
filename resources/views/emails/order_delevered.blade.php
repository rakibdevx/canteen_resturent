<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Delivered Successfully</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 140px;
        }

        h1 {
            color: #28a745;
            font-size: 22px;
            text-align: center;
        }

        .success-box {
            text-align: center;
            background: #e6f9ee;
            color: #1e7e34;
            padding: 15px;
            border-radius: 8px;
            font-size: 18px;
            margin: 20px 0;
            font-weight: bold;
        }

        .info {
            font-size: 14px;
            color: #444;
            line-height: 1.6;
        }

        .order-box {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 6px;
            margin-top: 10px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            color: #777;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Logo -->
    <div class="logo">
        <img src="{{ config('site.url') . 'assets/images/logo_light.png' }}" alt="Logo">
    </div>

    <!-- Heading -->
    <h1>Order Delivered Successfully 🎉</h1>

    <div class="success-box">
        Thank you {{ $customerName }}!
    </div>

    <p class="info">
        Your order has been successfully delivered by our rider. We hope you enjoyed your meal!
    </p>

    <div class="order-box">
        <p><strong>Order Number:</strong> {{ $orderNo }}</p>
        <p><strong>Delivery Status:</strong> Completed</p>
        <p><strong>Delivered At:</strong> {{ $deliveredAt }}</p>
    </div>

    <p class="info">
        If you have any feedback or issues, feel free to contact our support team.
    </p>

    <div class="footer">
        <hr>
        <p>Thanks for choosing {{ config('site.name') }} 💚</p>
    </div>

</div>

</body>
</html>