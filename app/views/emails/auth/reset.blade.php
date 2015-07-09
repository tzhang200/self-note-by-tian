<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Password reset notice</h2>

<div>
    Welcome to  the Self Note app. YOUR NEW PASSWORD IS {{$newPassword}}. It's recommended to change your password once you log in with this password.
    Please keep this email or write this down.
</div>
<div>
    To log in again, please click this link: <a href="{{ URL::to('login' ) }}">Log in</a> <br/>
</div>

</body>
</html>