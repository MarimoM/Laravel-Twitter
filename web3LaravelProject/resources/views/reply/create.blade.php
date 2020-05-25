@extends('main')

@section('main')
<div class="container mt-5">
    <div class ='jumbotron' >
        <h2>{{$sender->first_name}}</h2>
        <small class="float-right">{{$message->created_at}}</small>
        {{$message->text}}
        <br><br>
        @if (!is_null($message->cover_image))
            <img style="width:30%" src="/storage/cover_images/{{$message->cover_image}}">
        @endif
    </div>

    @if(Auth::id() == $message->sender_id)
    <hr>
    <a href="/messages/{{$message->id}}/edit" class="btn btn-primary">Edit</a>
    {!!Form::open(['action' => ['MessagesController@destroy', $message->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Remove', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif

    {!! Form::open(['action' => ['ReplyController@store', $message->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <br><br>
            {{Form::label('intro', 'Write your reply here')}}
            {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Write here'])}}
        </div>
        <div class ='form-group'>
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Send', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

@endsection
