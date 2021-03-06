<?php

use App\Channel;
use App\User;

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
    $channel = str_random();
    Channel::create([
       'user_id' =>  User::inRandomOrder()->first()->id,
       'channel' => $channel
    ]);
    
    return view('welcome')->withChannel($channel);
    
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/messages', 'MessageController');