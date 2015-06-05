@extends('layouts/basic')

@section('maincontent')
    <div id="note_body">
    <div id="wrapper">
        {{Form::open(array('method'=>'PUT','route' => array('notes.update', $note->email), 'files' => true))}}
        <h2 id="header">{{$note->email}} - <span>{{HTML::linkRoute('logout','Log out')}}</span></h2>
        <div id="section1">
            <div id="column1">
                <h2>notes</h2>
                {{FORM::textarea('notes', $note->notes, array('cols'=>'16', 'rows'=>'40'))}}
            </div>
            <div id="column2">
                <h2>websites</h2>
                <h3>click to open</h3>
                {{FORM::text('hlink1', $note->hlink1, array('onclick'=>'openTextInNew(this);'))}}
                <br>
                {{FORM::text('hlink2', $note->hlink2)}}
                <br>
                {{FORM::text('hlink3', $note->hlink3)}}
                <br>
                {{FORM::text('hlink4', $note->hlink4)}}
                <br>
            </div>
        </div>
        <div id="section2">
            <div id="column3">
                <h2>images</h2>
                <h3>click for full size</h3>
                @if ( $note->img1 == null )
                    {{FORM::file('img1')}}
                @else
                 <a href="{{$note->img1}}">
                    <img src="{{$note->img1}}" width="30px" />
                 </a>
                 {{FORM::checkbox('delImg1')}}
                @endif
                {{FORM::file('img2')}}
                {{FORM::file('img3')}}
                {{FORM::file('img4')}}
            </div>
            <div id="column4">
                <h2>tbd</h2>
                {{FORM::textarea('tbd', $note->tbd, array('cols'=>'16', 'rows'=>'40'))}}
            </div>
        </div>
        <div id="footer">
            {{FORM::submit('Save', array('class'=>'btn-primary'))}}
        </div>
    {{Form::close()}}
    </div>
    </div>
@stop
