@extends('layouts.basic')

@section('maincontent')
<h1>Register</h1>
{{Form::open(['route'=>'users.store'], array('class'=>'form-horizontal'))}}
    <div class="form-group">
        {{Form::label('email', 'Email Address', array('class'=>'control-label col-sm-2'))}}
        <div class="col-sm-10">
            {{Form::text('email')}}
            <span class='text-danger'>{{$errors->first('email')}}</span>
        </div>
    </div>
    <div class="form-group">
        {{Form::label('password', 'Password', array('class'=>'control-label col-sm-2'))}}
        <div class="col-sm-10">
            {{Form::password('password')}}
            <span class='text-danger'>{{$errors->first('password')}}</span>
        </div>
    </div>
    <div class="form-group">
        {{Form::label('password_confirm', 'Password confirmation',array('class'=>'control-label col-sm-2'))}}
        <div class="col-sm-10">
            {{Form::password('password_confirmation')}}
            <span class='text-danger'>{{$errors->first('password_confirmation')}}</span>
        </div>
    </div>
    <div class="form-group">
        {{HTML::image(Captcha::getImage(4), 'Captcha image', array('class'=>'col-sm-4'))}}
        <div class="col-sm-8">
            {{Form::text('user-captcha')}}
            <span class="text-danger">{{$errors->first('user-captcha')}}</span>
        </div>
    </div>
    <div class="form-group">
        {{Form::submit("Register", array('class'=>'btn-primary'))}} or {{HTML::linkRoute('sessions.create','log in')}}
    </div>
{{Form::close()}}

@stop