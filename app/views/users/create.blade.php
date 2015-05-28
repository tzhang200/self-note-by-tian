@extends('layouts.basic')

@section('maincontent')
<h1>Register</h1>
{{Form::open(['route'=>'users.store'])}}
    <div>
        {{Form::label('email', 'Email Address')}}
        {{Form::text('email')}}
        {{$errors->first('email')}}
    </div>
    <div>
        {{Form::label('password', 'Password')}}
        {{Form::password('password')}}
        {{$errors->first('password')}}
    </div>
    <div>
        {{Form::label('password_confirm', 'Password confirmation')}}
        {{Form::password('password_confirmation')}}
        {{$errors->first('password_confirmation')}}
    </div>
    <div>
        {{HTML::image(Captcha::getImage(), 'Captcha image')}}
        {{Form::text('user-captcha')}}
        {{$errors->first('user-captcha')}}
    </div>
    <div>
        {{Form::submit("Register")}} or {{HTML::linkRoute('sessions.create','log in')}}
    </div>
{{Form::close()}}

@stop