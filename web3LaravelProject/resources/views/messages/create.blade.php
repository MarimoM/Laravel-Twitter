@extends('main')

@section('main')
<div class="container">
    <h1>Create a message</h1>
    {!! Form::open(['action' => 'MessagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('intro', 'What are you up to?')}}
            {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Write here'])}}
        </div>
        <form method="post" action="{{url('file')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="input-group hdtuto control-group lst increment" >
                <input type="file" name="cover_image[]" class="myfrm form-control">
                <div class="input-group-btn"> 
                <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i></button>
                </div>
            </div>
        
            <div class="clone hide">
                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                <input type="file" name="cover_image[]" class="myfrm form-control">
                <div class="input-group-btn"> 
                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i></button>
                </div>
                </div>
            </div>
        
        {{Form::submit('Send', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

@endsection