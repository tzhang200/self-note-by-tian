{{-- T Zhang 2015 --}}
@extends('layouts.basic')

@section('maincontent')
    <h1>Change Password</h1>
    {{Form::open(['route'=>'change_password'], array('class'=>'form-horizontal'))}}
    <div class="row">
        {{Form::label('email', 'Email Address', array('class'=>'control-label col-sm-3'))}}
        <div class="col-sm-9">
            {{Form::text('email')}}
            <span class='text-danger'>{{$errors->first('email')}}</span>
        </div>
    </div>
    <div class="row">
        {{Form::label('oldPassword', 'Old Password', array('class'=>'control-label col-sm-3'))}}
        <div class="col-sm-9">
            {{Form::password('oldPassword')}}
            <span class='text-danger'>{{$errors->first('oldPassword')}}</span>
        </div>
    </div>
    <div class="row">
        {{Form::label('password', 'New Password', array('class'=>'control-label col-sm-3'))}}
        <div class="col-sm-9">
            {{Form::password('password')}}
            <span class='text-danger'>{{$errors->first('password')}}</span>
        </div>
    </div>
    <div class="row">
        {{Form::label('password_confirm', 'Retype New Password',array('class'=>'control-label col-sm-3'))}}
        <div class="col-sm-9">
            {{Form::password('password_confirmation')}}
            <span class='text-danger'>{{$errors->first('password_confirmation')}}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            {{Form::submit("Change", array('class'=>'btn-primary'))}} or {{HTML::linkRoute('sessions.create','Back to Notes')}}
        </div>
    </div>

    {{Form::close()}}

    @if(Session::has('message'))
        <p class="alert text-danger">{{ Session::get('message') }}</p>
    @endif
@stop