{{-- T Zhang 2015 --}}
@extends('layouts/basic')

@section('maincontent')
    <div id="note_body">
    <div id="wrapper">
        {{Form::open(array('method'=>'PUT','route' => array('notes.update', $note->email), 'files' => true))}}
        <h2 id="header">{{$note->email}} - <span>{{HTML::linkRoute('logout','Log out')}}| {{HTML::linkRoute('changing_password', 'Change password')}}</span></h2>
        <div id="section1">
            <div id="column1">
                <h2>Notes</h2>
                {{FORM::textarea('notes', $note->notes, array('cols'=>'16', 'rows'=>'40'))}}
            </div>
            <div id="column2">
                <h2>Websites</h2>
                <h3>Click to open</h3>
                @if ($note->hlinks !== null)
                    <?php $links = explode('\t',$note->hlinks); $count = count($links); $i=0?>
                    @for ($i=0; $i < $count; $i++)

                        <input type="text" name="hlinks[{{$i}}]" value="{{$links[$i]}}" onclick="openTextInNew(this);">
                        <span class='text-danger'>{{$errors->first("hlinks[$i]")}}</span>
                        <hr />
                    @endfor

                @endif
                @for ($j= $i; $j < $i + 4; $j++)
                    <input type="text" name="hlinks[{{$j}}]" >
                    <span class='text-danger'>{{$errors->first("hlinks[$j]")}}</span>
                    <hr />
                @endfor

            </div>
        </div>
        <div id="section2">
            <div id="column3">
                <h2>Images</h2>
                <h3>Click for full size</h3>
                @if ( $note->img1 == null )
                    {{FORM::file('img1', array('accept'=>'.jpg,.gif'))}}
                    <span class='text-danger'>{{$errors->first('img1')}}</span>
                @else
                 <a href="{{$note->img1}}" target="_blank">
                    <img src="{{$note->img1}}" height="50px" width="80px" />
                 </a>
                 {{FORM::checkbox('delImg1')}} Remove
                @endif
                <hr />
                @if ( $note->img2 == null )
                    {{FORM::file('img2',array('accept'=>'.jpg,.gif'))}}
                    <span class='text-danger'>{{$errors->first('img2')}}</span>
                @else
                    <a href="{{$note->img2}}" target="_blank">
                        <img src="{{$note->img2}}" height="50px" width="80px"/>
                    </a>
                    {{FORM::checkbox('delImg2')}} Remove
                @endif
                <hr />
                @if ( $note->img3 == null )
                    {{FORM::file('img3', array('accept'=>'.jpg,.gif'))}}
                    <span class='text-danger'>{{$errors->first('img3')}}</span>
                @else
                    <a href="{{$note->img3}}" target="_blank">
                        <img src="{{$note->img3}}" height="50px" width="80px" />
                    </a>
                    {{FORM::checkbox('delImg3')}} Remove
                @endif
                <hr />
                @if ( $note->img4 == null )
                    {{FORM::file('img4', array('accept'=>'.jpg,.gif'))}}
                    <span class='text-danger'>{{$errors->first('img4')}}</span>
                @else
                    <a href="{{$note->img4}}" target="_blank">
                        <img src="{{$note->img4}}" height="50px" width="80px" />
                    </a>
                    {{FORM::checkbox('delImg4')}} Remove
                @endif
            </div>
            <div id="column4">
                <h2>TBD</h2>
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
