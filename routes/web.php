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
Route::get('/{any}', 'AppController@index')->where('any', '.*');
/*
Route::get('/', function () {
    return view('app');
});
*/
//Auth::routes();

/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/moderator/dashboard', function (){
    return view('moderator/dashboard');
})->middleware('auth', 'check-moderator');

Route::get('/admin/dashboard', function (){
    return view('admin/dashboard');
})->middleware('auth', 'check-admin');

*/