<?php

use App\Challenge;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});





Route::resource('challenge', 'ChallengeController');

Route::post('challenge/{id}', 'ChallengeController@update')->name('challenge.edit');

Route::get('challenge/{id}/submit', 'ChallengeController@submit');

Route::resource('user','UserController');

Route::post('user/{id}', 'UserController@update')->name('user.edit');

Route::resource('userchallenge', 'ChallengeUserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
