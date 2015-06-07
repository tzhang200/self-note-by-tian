@extends('layouts/basic')
@section('maincontent')
    <div>
        <h2>Your email has been verified.</h2>
        <h2> Now you can {{HTML::linkRoute('login', 'Log in')}}.</h2>
    </div>
@stop