@extends('main')

@section('main')

<div class="container mt-5">
    <div class ='jumbotron' >
        <div class="row">
            <div class="col-sm-540">
                <img src="{{asset('images/' . $user->profile_image_path)}}" width="100px" height="100px" class="rounded-circle"/>
            </div>
            <div class="col-sm">
                <h2>{{$user->first_name}}</h2>
                <small class="float-right">{{$message->created_at}}</small>
                {{$message->text}}
                <br><br>
                <div class="container">
                    <div class="row">
                        @if (!is_null($message->cover_image))
                            @php $images = json_decode($message->cover_image,true); @endphp
                            @if(is_array($images) && !empty($images))
                                @foreach ($images as $image)
                                <div class="col">
                                    <img class="mw-100", height="mh-100" src="/storage/cover_images/{{$image}}">
                                </div>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
                <br><br>
                @if(Auth::id() == $message->user_id)
                <hr>
                    {!!Form::open(['action' => ['MessagesController@destroy', $message->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Remove', ['class' => 'btn btn-danger btn-sm float-right'])}}
                    {!!Form::close()!!}
                    <a href="/messages/{{$message->id}}/edit" class="btn btn-primary btn-sm float-right mr-3">Edit</a>
                @endif
                    <a href="/messages/{{$message->id}}/reply/create" class="btn btn-light btn-sm float-left ">Reply</a>
                    <p class="text-center"> {{ count($replies) }} replies </p>
            </div>
        </div>
    </div>

    <div>
        @foreach ($replies as $reply)
        <section>
            @if ($reply->message_id == $message->id)
            <div class="card card-body bg-light mt-3">
                <h4>{{ $reply->first_name}}</h4> 
                <small class="float-right">{{ $reply->updated_at }}</small>
                <p>{{ $reply->text }}</p> 
                <br>
                @if (Auth::id() == $reply->sender_id)
                    {!!Form::open(['action' => ['ReplyController@destroy', $message->id, $reply->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Remove', ['class' => 'btn btn-danger btn-sm float-right'])}}
                    {!!Form::close()!!}
                @endif
            </div>
            @endif
        </section>
        @endforeach
    </div>
</div>

@endsection