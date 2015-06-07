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
                <span class='text-danger'>{{$errors->first('hlink1')}}</span>
                <hr />
                {{FORM::text('hlink2', $note->hlink2, array('onclick'=>'openTextInNew(this);'))}}
                <span class='text-danger'>{{$errors->first('hlink2')}}</span>
                <hr />
                {{FORM::text('hlink3', $note->hlink3, array('onclick'=>'openTextInNew(this);'))}}
                <span class='text-danger'>{{$errors->first('hlink3')}}</span>
                <hr />
                {{FORM::text('hlink4', $note->hlink4, array('onclick'=>'openTextInNew(this);'))}}
                <span class='text-danger'>{{$errors->first('hlink4')}}</span>
                <br>
            </div>
        </div>
        <div id="section2">
            <div id="column3">
                <h2>images</h2>
                <h3>click for full size</h3>
                @if ( $note->img1 == null )
                    {{FORM::file('img1', array('accept'=>'.jpg,.gif'))}}
                    <span class='text-danger'>{{$errors->first('img1')}}</span>
                @else
                 <a href="{{$note->img1}}" target="_blank">
                    <img src="{{$note->img1}}" height="30px" />
                 </a>
                 {{FORM::checkbox('delImg1')}}
                @endif
                <hr />
                @if ( $note->img2 == null )
                    {{FORM::file('img2',array('accept'=>'.jpg,.gif'))}}
                    <span class='text-danger'>{{$errors->first('img2')}}</span>
                @else
                    <a href="{{$note->img2}}" target="_blank">
                        <img src="{{$note->img2}}" height="30px" />
                    </a>
                    {{FORM::checkbox('delImg2')}}
                @endif
                <hr />
                @if ( $note->img3 == null )
                    {{FORM::file('img3', array('accept'=>'.jpg,.gif'))}}
                    <span class='text-danger'>{{$errors->first('img3')}}</span>
                @else
                    <a href="{{$note->img3}}" target="_blank">
                        <img src="{{$note->img3}}" height="30px" />
                    </a>
                    {{FORM::checkbox('delImg3')}}
                @endif
                <hr />
                @if ( $note->img4 == null )
                    {{FORM::file('img4', array('accept'=>'.jpg,.gif'))}}
                    <span class='text-danger'>{{$errors->first('img4')}}</span>
                @else
                    <a href="{{$note->img4}}" target="_blank">
                        <img src="{{$note->img4}}" height="30px" />
                    </a>
                    {{FORM::checkbox('delImg4')}}
                @endif
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
