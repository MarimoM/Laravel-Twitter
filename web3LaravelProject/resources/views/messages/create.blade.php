@extends('main')

@section('main')
    <h1>Add message</h1>

    <form action="/messages" method="POST">
        @csrf
        <div>
            <label for="message.text">What are you up to?</label>
        </div>
        <div>
            <textarea maxlength="150" name="text" id="message-text"></textarea>
            @if ($errors->has('text'))
                @foreach ($errors->get('text') as $message)
                    <pre>{{ $message }}</pre>
                @endforeach
            @endif
        </div>
        <div>
            <button>Send</button>
        </div>
    </form>
@endsection