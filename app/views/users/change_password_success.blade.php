{{-- T Zhang 2015 --}}
@extends('layouts/basic')

@section('maincontent')
    <div>
        <h3>You password has been changed. Next time, please use the new password to log in</h3>
        <h3> Now you can go back to your {{HTML::linkRoute('login', 'Notes')}}.</h3>
    </div>
@stop