<?php
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->namespace('Admin')->name('admin.')->middleware(['web','auth'])->group(function () {
    Route::get('/users/','UserController@index')->name('users.index');
    Route::get('/users/create','UserController@create')->name('users.create');
    Route::post('/users/store','UserController@store')->name('users.store');
    Route::get('/users/edit','UserController@edit')->name('users.edit');
    Route::post('/users/update','UserController@update')->name('users.update');
    Route::get('/users/delete','UserController@destroy')->name('users.destroy');
});
