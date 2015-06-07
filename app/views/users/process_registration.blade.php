@extends('layouts/basic')
@section('maincontent')
<div>
    <h2>Your account can not be verified.</h2>
    <h3> If you already verified before, then you can {{HTML::linkRoute('login', 'log in')}}.
        Otherwise, Please check your register email for the correct verification URL to verify again.</h3>
</div>
@stop