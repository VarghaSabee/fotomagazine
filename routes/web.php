<?php

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

Route::get('/', 'HomeController@index')->name('index');

Route::get('orders/user','OrdersController@user')->name('orders.user');

Auth::routes();

Route::prefix('adminss')->group(function() {
    Route::get('/login',
        'Auth\AdminLoginController@showLoginForm')->name('adminss.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('adminss.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('adminss.logout');
    Route::get('/', 'AdminController@index')->name('adminss.dashboard');
}) ;

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'GalleryController@getImages');


Route::resource('orders', 'OrdersController');

Route::resource('services', 'ServicesController');

Route::resource('users', 'UsersController');
Route::post('users/update{id}', 'UsersController@update')->name('users.update');
Route::post('users/update/image', 'UsersController@updateImg')->name('users.image');

