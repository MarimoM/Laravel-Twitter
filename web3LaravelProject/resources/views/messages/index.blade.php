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
                <br>
                <p>{{ $message->text }}</p> 
                <div class="container">
                    <div class="row">
                        @if (!is_null($message->cover_image))
                            @php $images = json_decode($message->cover_image,true); @endphp
                            @if(is_array($images) && !empty($images))
                                @foreach ($images as $image)
                                <div class="col">
                                    <img width="300px", height="auto" src="/storage/cover_images/{{$image}}">
                                </div>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
                <br>
                <small><a href="/messages/{{$message->id}}">Show more ...</a></small>
                <a href="/messages/{{$message->id}}/reply/create" class="btn btn-light btn-sm float-left">Reply</a>
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