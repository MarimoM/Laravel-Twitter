@extends('main')

@section('main')
<div class="container">
    <h1>Create a message</h1>
    {!! Form::open(['action' => 'MessagesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('intro', 'What are you up to?')}}
            {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Write here'])}}
        </div>
        {{Form::submit('Send', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection