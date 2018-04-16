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


/*Admins*/
Route::prefix('admin')->group(function() {
    Route::get('/login',
        'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
}) ;

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'GalleryController@getImages');


Route::resource('orders', 'OrdersController');
Route::post('orders/status/{id}', 'OrdersController@updateStatus')->name('orders.status');

Route::resource('services', 'ServicesController');

Route::resource('users', 'UsersController');
Route::post('users/update{id}', 'UsersController@update')->name('users.update');
Route::post('users/update/image', 'UsersController@updateImg')->name('users.image');

Route::get('/gallery', 'GalleryController@index')->name('gallery');

