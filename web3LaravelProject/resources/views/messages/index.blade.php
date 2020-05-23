@extends('main')

@section('main')
    
    <h1 class='jumbotron text-center'>Messages</h1>
    <main>
        @if (count($messages) > 0)
        <div class="container">
            @foreach ($messages as $message)
            <section>
            <div class="card card-body bg-light mt-3">
                <h4>{{ $message->first_name}}</h4> 
                <small class="float-right">{{ $message->updated_at }}</small>
                <p>{{ $message->text }}</p> 
                @if (!is_null($message->cover_image))
                    <img style="width:30%" src="/storage/cover_images/{{$message->cover_image}}">
                 @endif
                 <br>
                <small><a href="/messages/{{$message->id}}">Show more ...</a></small>
                <a href="/messages/{{$message->id}}/reply" class="btn btn-light btn-sm float-left">Reply</a>
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