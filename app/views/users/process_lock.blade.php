{{-- T Zhang 2015 --}}
@extends('layouts/basic')
@section('maincontent')
    <div>
        <h3>A break-in attempt are detected on your account. Your account is locked. An email is sent to your registration email.
            You will need to follow the instruction in the email to unlock your account.</h3>
        <h3>Alternatively, you can {{HTML::linkRoute('forgot_password', 'reset your password')}}.</h3>
        <h3> Then you can {{HTML::linkRoute('login', 'Log in')}} again.</h3>
    </div>
@stop