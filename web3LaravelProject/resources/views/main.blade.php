@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('.htaccess')}}">
        <title>{{config('app.name', "Twitter")}}</title>
    </head>
    <body>
        @include('inc.navbar')
       <div class="container">
            @include('inc.errors')
       </div>
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
                <li><a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); 
                    document.getElementById('frm-logout').submit();">Logout</a>
                </li>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                
                <li><a href="/messages/create">Write a message</a></li>

                @section ('main')
                @show
                </div>
            @endif
        </ul>
    </body>
</html>
