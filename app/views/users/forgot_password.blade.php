{{-- T Zhang 2015 --}}
@extends('layouts.basic')

@section('maincontent')
    <h2>Reset Your Password</h2>
    <p>Type your email address in the text box below. A new password will be sent to your email address</p>
    <p>And then you can {{HTML::linkRoute('login', 'Log in')}} again.</p>
    {{Form::open(['route'=>'reset_password'])}}
        <div>
            {{Form::label('email', 'Email address')}}
            {{Form::email('email')}}
            <span class='text-danger'>{{$errors->first('email')}}</span>
        </div>
        <div>
            {{Form::submit('Email new password')}}
        </div>
    {{Form::close()}}
@stop