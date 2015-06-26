@extends('layouts/basic')
@section('maincontent')
    <div>
        <h2>A break-in attempt are detected on your account. Your account is locked. An email is sent to your registration email. You will need to follow the instruction in the email to unlock your account.</h2>
        <h2>Alternatively, you can {{HTML::linkRoute('forgot_password', 'reset your password')}}.</h2>
        <h2> Then you can {{HTML::linkRoute('login', 'Log in')}} again.</h2>
    </div>
@stop