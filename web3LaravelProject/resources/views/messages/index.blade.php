@extends('main')

@section('main')
    
    <h1>Messages</h1>
    <main>
        @if (count($messages) > 0)
        <div class="container">
            @foreach ($messages as $message)
            <section>
            <div class="well">
               <h4>{{ $message->name}}</h4> 
               <small>{{ $message->updated_at }}</small>
               <p>{{ $message->text }}</p>
               <small><a href="/messages/{{$message->id}}">Show more ...</a></small> 
               <button>Reply</button>
            </div>
            </section>
            @endforeach
        </div>
        <div class='jumbotron text-center'>
            {{ $messages->links() }}
        </div>
        
        @else
            <p>No messages found</p>
        @endif
        </section>
        </div>
    </main>
    
@endsection