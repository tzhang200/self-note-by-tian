{{-- T Zhang 2015 --}}
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    Thanks for creating an account with the Self Note app.
    Please click the link below to verify your email address
    <a href="{{ URL::to('users/verify/' . $confirmationCode) }}">Confirm registration</a> <br/>

</div>

</body>
</html>