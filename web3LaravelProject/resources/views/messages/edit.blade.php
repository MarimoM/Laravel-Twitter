@extends('main')

@section('main')
<div class="container mt-5">
    <h1>Edit message</h1>
    {!! Form::open(['action' => ['MessagesController@update', $message->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('intro', 'What are you up to?')}}
            {{Form::textarea('text', $message->text, ['class' => 'form-control', 'placeholder' => 'Write here'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
        <a href="/messages/{{$message->id}}" class="btn btn-light float-right">Cancel</a>
    {!! Form::close() !!}
</div>
@endsection