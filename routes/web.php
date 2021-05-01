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
    //Users
    Route::get('/users/','UsersController@index')->name('users.index');
    Route::get('/users/create','UsersController@create')->name('users.create');
    Route::post('/users/store','UsersController@store')->name('users.store');
    Route::get('/users/edit','UsersController@edit')->name('users.edit');
    Route::post('/users/update','UsersController@update')->name('users.update');
    Route::get('/users/delete','UsersController@destroy')->name('users.destroy');

    //Roles
    Route::get('/roles/','RolesController@index')->name('roles.index');
    Route::get('/roles/create','RolesController@create')->name('roles.create');
    Route::post('/roles/store','RolesController@store')->name('roles.store');
    Route::get('/roles/edit','RolesController@edit')->name('roles.edit');
    Route::post('/roles/update','RolesController@update')->name('roles.update');
    Route::get('/roles/delete','RolesController@destroy')->name('roles.destroy');

    //Permissions
    Route::get('/permissions/','PermissionsController@index')->name('permissions.index');
    Route::get('/permissions/create','PermissionsController@create')->name('permissions.create');
    Route::post('/permissions/store','PermissionsController@store')->name('permissions.store');
    Route::get('/permissions/edit','PermissionsController@edit')->name('permissions.edit');
    Route::post('/permissions/update','PermissionsController@update')->name('permissions.update');
    Route::get('/permissions/delete','PermissionsController@destroy')->name('permissions.destroy');

    //History
    Route::get('/application-history/','HistoriesController@application_index')->name('application-history');
    Route::get('/system-history/','HistoriesController@system_index')->name('system-history');
});

Route::prefix('/profile')->name('profile.')->middleware(['web','auth'])->group(function () {
    Route::get('/','ProfilesController@index')->name('index');
});
