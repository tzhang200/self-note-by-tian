@extends('layouts.basic')

@section('maincontent')
<h1>Register</h1>
{{Form::open(['route'=>'users.store'])}}
    <div>
        {{Form::label('email', 'Email Address')}}
        {{Form::text('email')}}
    </div>
    <div>
        {{Form::label('password', 'Password')}}
        {{Form::password('password')}}
    </div>
    <div>
        {{Form::label('passwordConfirm', 'Password confirmation')}}
        {{Form::password('passwordConfirm')}}
    </div>
    <div>
        {{Form::submit("Register")}} or {{HTML::linkRoute('sessions.create','log in')}}
    </div>
{{Form::close()}}

@stop