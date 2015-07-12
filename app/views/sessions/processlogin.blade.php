{{-- T Zhang 2015 --}}
@extends('layouts/basic')
@section('maincontent')
    <div>
        Login error. Did you {{HTML::linkRoute('forgot_password','forget your password' )}}? Or haven't verified your email?
        Please try again to {{HTML::linkRoute('users.create','register' )}} or {{HTML::linkRoute('sessions.create','login')}}.
    </div>
@stop