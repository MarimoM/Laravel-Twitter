@extends('main')

@section('main')
<a href="/messages" class="btn btn-default">Back</a>
<div class="container">
    <h1>Thread</h1>
    <h2>{{$user->name}}</h2>
    <small>{{$message->created_at}}</small>
    <div>
        {{$message->text}}
    </div>

    @if(Auth::id() == $message->user_id)
    <a href="/messages/{{$message->id}}/edit" class="btn btn-default">Edit</a>
    
    <hr>
    {!!Form::open(['action' => ['MessagesController@destroy', $message->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Remove', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
</div>

@endsection