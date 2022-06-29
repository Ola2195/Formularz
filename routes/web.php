<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticatable;
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

Route::resource('users', 'UserController');
Route::resource('form', 'FormController');

Route::get('users/table', function () {
    if(Auth::check()) {
        return redirect('users/table');
    }
    return redirect('/login');
});

Route::get('/admin', 'LoginController@haslo')->name('admin');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('login submit');
Route::get('/logout', 'LoginController@logout')->name("logout");
