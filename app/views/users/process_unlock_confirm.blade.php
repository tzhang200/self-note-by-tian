@extends('layouts/basic')
@section('maincontent')
<div>
    <h2>A break-in attempt as detected on your account. You are successfully reset your account</h2>
    <h3> Now you can {{HTML::linkRoute('login', 'Log in')}} again with the password sent in your latest email notice.
        We recommend you changing your password once you log into your account.
    </h3>
</div>
@stop