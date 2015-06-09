@extends('layouts/basic')

@section('maincontent')
{{Form::open(['route'=>'sessions.store'])}}
    <h2>Log in</h2>
    <div class="row">
        {{Form::label('email', 'Email address', array('class'=>'col-sm-2'))}}
        <div class="col-sm-10">
            {{Form::email('email')}}
            <span class='text-danger'>{{$errors->first('email')}}</span>
        </div>
    </div>
    <div class="row">
        {{Form::label('password', 'Password', array('class'=>'col-sm-2'))}}
        <div class="col-sm-10">
            {{Form::password('password')}}
            <span class='text-danger'>{{$errors->first('password')}}</span>
        </div>
    </div>
    <div class="row">
        {{Form::submit('Log in', array('class'=>'btn-primary'))}}
    </div>
{{Form::close()}}

{{HTML::linkRoute('users.create', 'Register')}} | {{HTML::linkRoute('forgotpassword', 'Forgot password')}}

@stop