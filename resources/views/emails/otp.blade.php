  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
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
            color: #0073e6;
            font-size: 20px;
        }

        .otp-box {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 6px;
            padding: 15px;
            background: #f1f1f1;
            border-radius: 8px;
            margin: 20px 0;
            color: #000;
        }

        .note {
            font-size: 14px;
            color: #666;
            margin-top: 10px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Logo -->
    <div class="logo">
        <img src="{{ config('site.url') . 'assets/images/logo_light.png' }}" alt="Logo">
    </div>

    <!-- Greeting -->
    <h1>Hello, {{ $user->first_name }},</h1>

    <p>Thanks for your order! To confirm your order, please use the OTP below:</p>

    <!-- OTP -->
    <div class="otp-box">
        {{ $otp }}
    </div>

    <p class="note">
        This OTP is valid for a limited time. Do not share it with anyone.
    </p>

    <p><strong>Order Number:</strong> {{ $orderNo }}</p>

    <div class="footer">
        <hr>
        <p>If you did not request this, ignore this email.</p>
        <p>Regards,<br>{{ config('site.name') }}</p>
    </div>

</div>

</body>
</html>