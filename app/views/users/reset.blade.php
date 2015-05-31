<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Password reset notice</h2>

<div>
   Welcome to  the Self Note app. YOUR NEW PASSWORD IS {{$newPassword}}. Please keep this email or write this down.
</div>
<div>
    To log in again, please click this link:  {{ URL::to('users/verify/' . $confirmationCode) }} <br/>
</div>

</body>
</html>