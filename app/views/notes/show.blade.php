@extends('layouts/basic')

@section('maincontent')
    <div id="note_body">
    <div id="wrapper">
        {{Form::open(array('method'=>'PUT','route' => array('notes.update', $note->email)))}}
        <h2 id="header">{{$note->email}} - <span>{{HTML::linkRoute('logout','Log out')}}</span></h2>
        <div id="section1">
            <div id="column1">
                <h2>notes</h2>
                {{FORM::textarea('notes', null, array('cols'=>'16', 'rows'=>'40'))}}
            </div>
            <div id="column2">
                <h2>websites</h2>
                <h3>click to open</h3>
                {{FORM::text('hlink1')}}
                <br>
                {{FORM::text('hlink2')}}
                <br>
                {{FORM::text('hlink3')}}
                <br>
                {{FORM::text('hlink4')}}
                <br>
            </div>
        </div>
        <div id="section2">
            <div id="column3">
                <h2>images</h2>
                <h3>click for full size</h3>
                {{FORM::file('img1')}}
                {{FORM::file('img2')}}
                {{FORM::file('img3')}}
                {{FORM::file('img4')}}
            </div>
            <div id="column4">
                <h2>tbd</h2>
                {{FORM::textarea('tbd', null, array('cols'=>'16', 'rows'=>'40'))}}
            </div>
        </div>
        <div id="footer">
            {{FORM::submit('Save', array('class'=>'btn-primary'))}}
        </div>
    {{Form::close()}}
    </div>
    </div>
@stop
