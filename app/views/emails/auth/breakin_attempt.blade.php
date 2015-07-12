{{-- T Zhang 2015 --}}
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Account Locked notice</h2>

<div>
    Welcome to  the Self Note app. Your account has been locked because of being unsuccessfully logged in for more than 3 times.
    YOUR PASSWORD has been reset to {{$newPassword}}. It's recommended to change your password once logging in with this password.
</div>
<div>
    To unlock your account, please click this link to
    <a href="{{ URL::to('users/unlock/' . $confirmationCode) }}">unlock your account</a>. <br/>
</div>

</body>
</html>