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

Route::get('/chat', function () {
    if(Auth::check())
        return redirect('/chat');
    else
        return view('main');
});

Route::resource('profile', 'ProfileController');
Route::resource('/chat', 'ChatController');
Route::get('chat/{chat}', 'ChatController@show')->name('chat.show');

Route::resource('/messages', 'MessagesController');
Route::resource('/messages/{message}/reply', 'ReplyController');

Auth::routes();


Route::get('/export', 'ExcelController@export');

Route::get('/home', 'HomeController@index');

Route::get('/pdf','PdfController@downloadPdf');