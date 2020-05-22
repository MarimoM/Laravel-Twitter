<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check())
        return redirect('/messages');
    else
        return view('main');
});

Route::get('/profile', function () {
    if(Auth::check())
        return redirect('/profile');
    else
        return view('main');
});



Route::resource('/messages', 'MessagesController');
Route::resource('profile', 'ProfileController');

Auth::routes();

Route::get('/home', 'HomeController@index');