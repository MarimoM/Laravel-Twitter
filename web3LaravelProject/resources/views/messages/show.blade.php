@extends('main')

@section('main')
<div class="container">
    <h1>Thread</h1>
    <h2>{{$user->name}}</h2>
    <small class="float-right">{{$message->created_at}}</small>
    <div>
        {{$message->text}}
    </div>

    @if(Auth::id() == $message->user_id)
    
    <hr>
    <a href="/messages/{{$message->id}}/edit" class="btn btn-primary">Edit</a>
    {!!Form::open(['action' => ['MessagesController@destroy', $message->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Remove', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
</div>

@endsection