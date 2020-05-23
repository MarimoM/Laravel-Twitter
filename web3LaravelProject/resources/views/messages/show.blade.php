@extends('main')

@section('main')
<div class="container mt-5">
    <h1 class ='jumbotron text-center' >Thread</h1>
    <h2>{{$user->first_name}}</h2>
    <small class="float-right">{{$message->created_at}}</small>
    <div>
        {{$message->text}}
        <br><br>
        @if (!is_null($message->cover_image))
            <img style="width:30%" src="/storage/cover_images/{{$message->cover_image}}">
        @endif
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