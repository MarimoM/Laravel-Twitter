@extends('main')

@section('main')
    <h1>Messages</h1>
    <main>
        @foreach ($messages as $message)
        <section>
        <hr>
            <header>{{ $message->name}}</header>
            <div>{{ $message->text }}</div>
        </hr>
        </section>
        @endforeach
    </section>
@endsection