@extends('layouts/basic')
@section('maincontent')
    <div>
        Login error. Did you {{HTML::linkRoute('users.forgotpassword','forget your password' )}}? Or haven't verified your email?
        Please try again to {{HTML::linkRoute('users.create','register' )}} or {{HTML::linkRoute('session.create','login')}}.
    </div>
@stop