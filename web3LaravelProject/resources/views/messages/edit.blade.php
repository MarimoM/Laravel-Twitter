@extends('main')

@section('main')
<div class="container">
    <h1>Edit message</h1>
    {!! Form::open(['action' => ['MessagesController@update', $message->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('intro', 'What are you up to?')}}
            {{Form::textarea('text', $message->text, ['class' => 'form-control', 'placeholder' => 'Write here'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection