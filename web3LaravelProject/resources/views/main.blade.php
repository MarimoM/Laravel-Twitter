<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Twitter</title>
    </head>
    <body>
        <h1>Laravel Twitter</h1>
        <h2>Navigation</h2>
        <ul>
            @if (!Auth::check())
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            @else
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); 
                    document.getElementById('frm-logout').submit();">Logout</a> </li>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                
                <li><a href="/messages/create">Write a message</a></li>
            @endif
        </ul>

        @section ('main')

        @show
    </body>
</html>
