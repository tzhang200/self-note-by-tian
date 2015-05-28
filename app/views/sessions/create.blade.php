@extends('layouts/basic')

@section('maincontent')
{{Form::open(['route'=>'sessions.store'])}}
    <h2>Log in</h2>
    <div>
        {{Form::label('email', 'Email address')}}
        {{Form::email('email')}}
    </div>
    <div>
        {{Form::label('password', 'Password')}}
        {{Form::password('password')}}
    </div>
    <div>
        {{Form::submit('Log in')}}
    </div>
{{Form::close()}}

{{HTML::linkRoute('users.create', 'Register')}} | {{HTML::linkRoute('forgotpassword', 'Forgot password')}}

@stop