@extends('layouts/basic')
@section('maincontent')
<div>
    <h2>A break-in attempt as detected on your account. You are successfully reset your account</h2>
    <h2> Now you can {{HTML::linkRoute('login', 'Log in')}} again with the password sent in your latest email notice.</h2>
</div>
@stop