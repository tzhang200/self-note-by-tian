@extends('layouts/basic')

@section('maincontent')
    <h3>Note for {{$note->email}}</h3>


@stop

{{HTML::linkRoute('logout','log out')}}