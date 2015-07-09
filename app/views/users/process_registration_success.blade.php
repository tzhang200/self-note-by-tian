@extends('layouts/basic')
@section('maincontent')
    <div>
        <h2>Thank you for registering.</h2>
        <h2>An email has been sent to {{$email}}.</h2>
        <h2>Please confirm your registration by clicking on the link in your email.</h2>
        <h2> Then you can {{HTML::linkRoute('login', 'log in')}}.</h2>
    </div>
@stop