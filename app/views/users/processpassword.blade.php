@extends('layouts/basic')
@section('maincontent')
<div>
    <h2>Your password has been reset.</h2>
    <h3> Please check your register email for the new password, and use the new password from now on</h3>
    Then you can {{HTML::linkRoute('sessions.create')}};
</div>
@stop