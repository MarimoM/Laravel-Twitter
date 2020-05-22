@extends('layouts.app')

@section('content')
    <body>
            @if (!Auth::check())
            <div class='jumbotron text-center'>
                <h1>Welcome To Laravel Twitter</h1>
                <p>This is a Laravel Twitter clone!</p>
                <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                    <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
                </p>
            </div>
            @endif
        <ul>
            @if (Auth::check())
                <div class="container">
                @section ('main')
                @show
                </div>
            @endif
        </ul>
    </body>
</html>
@endsection
