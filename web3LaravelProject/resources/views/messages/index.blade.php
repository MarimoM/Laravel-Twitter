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
                            @php $images = json_decode($message->cover_image,true); @endphp
                            @if(is_array($images) && !empty($images))
                                @foreach ($images as $image)
                                <div class="col">
                                    <img width="300px", height="auto" src="/storage/cover_images/{{$image}}">
                                </div>
                                @endforeach
                            @endif
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