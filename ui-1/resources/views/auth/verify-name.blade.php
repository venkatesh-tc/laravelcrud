<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
</head>
<body>
    <h1>Verify Your Email Address</h1>
    <p>
        Before proceeding, please check your email for a verification link.
        If you did not receive the email, click below to request another.
    </p>
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
</body>
</html>
