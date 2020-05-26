@extends('main')

@section('main')
    
    <h1 class='jumbotron text-center'>Messages</h1>
    <main>
        @if (count($messages) > 0)
        <div class="container">
            @foreach ($messages as $message)
            <section>
            <div class="card card-body bg-light mt-3">
                <div class="row">
                    <div class="col-sm-540">
                        <img src="{{asset('images/' . $message->profile_image_path)}}" width="100px" height="100px" class="rounded-circle"/>
                    </div>
                    <div class="col-sm">
                        <h4>{{ $message->first_name}}</h4> 
                        <small class="float-right">{{ $message->updated_at }}</small>
                        <br>
                        <p>{{ $message->text }}</p> 
                        @if (!is_null($message->cover_image))
                            <img style="width:30%" src="/storage/cover_images/{{$message->cover_image}}">
                        @endif
                        <br>
                        <small><a href="/messages/{{$message->id}}">Show more ...</a></small>
                        <a href="/messages/{{$message->id}}/reply/create" class="btn btn-outline-secondary btn float-right">Reply</a>
                    </div>
                </div>
            </div>
            </section>
            @endforeach
        </div>
        <div class='container text-center mt-3'>
            {{ $messages->links() }}
        </div>
        
        @else
            <p>No messages found</p>
        @endif
        </section>
        </div>
    </main>
    
@endsection