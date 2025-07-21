<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Your Europoint Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px 20px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #fecd07;
            color: #000000;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888888;
            text-align: center;
        }

        .link {
            color: #1a0dab;
            word-break: break-word;
        }

        h2 {
            color: #333333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Password Reset Request</h2>
        <p>Hello,</p>
        <p>We received a request to reset your Europoint account password. You can reset it by clicking the button below:</p>

        <p style="text-align: center;">
            <a href="{{ $resetUrl }}" class="btn">Reset Password</a>
        </p>

        <p>If the button above doesn't work, copy and paste the following link into your browser:</p>
        <p class="link">{{ $resetUrl }}</p>

        <p>If you didn’t request this, you can safely ignore this email — your password will not be changed.</p>

        <div class="footer">
            &copy; {{ date('Y') }} Europoint. All rights reserved.
        </div>
    </div>
</body>

</html>
