<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $subject ?? config('app.name') }}</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; color: #333; padding: 20px; }
        .email-container { max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; }
        h1 { color: #1d72b8; }
        .otp-box { margin: 20px 0; padding: 15px; background: #f1f7ff; border-radius: 6px; text-align: center; }
        .otp { font-size: 22px; font-weight: bold; letter-spacing: 3px; color: #1d72b8; }
        .divider { margin: 25px 0; text-align: center; color: #999; }
        .link-box { word-break: break-all; }
    </style>
</head>
<body>
    <div class="email-container">

        <h1>{{ $subject ?? 'Password Recovery' }}</h1>

        <p>{{ $body ?? 'You requested to reset your password.' }}</p>

        @if(!empty($otp))
            <div class="otp-box">
                <p>Use this OTP to reset your password:</p>
                <div class="otp">{{ $otp }}</div>
                <p>This OTP will expire in 30 minutes.</p>
            </div>
        @endif

        <div class="divider">OR</div>

        @if(!empty($buttonUrl) && !empty($buttonText))
            <p style="text-align:center; margin-top:15px;">
                <a href="{{ $buttonUrl }}"
                   style="display:inline-block; padding:10px 20px; background-color:#1d72b8; color:#ffffff !important; text-decoration:none !important; border-radius:5px; font-weight:bold; text-align:center;">
                   {{ $buttonText }}
                </a>
            </p>
        @endif

        @if(!empty($buttonUrl))
            <p>If the button doesn’t work, copy and paste this link into your browser:</p>
            <p class="link-box">
                <a href="{{ $buttonUrl }}" style="color:#1d72b8; text-decoration:none;">{{ $buttonUrl }}</a>
            </p>
        @endif

        <p>If you did not request this, please ignore this email.</p>

        <p>Thanks,<br>{{ config('app.name') }}</p>

    </div>
</body>
</html>