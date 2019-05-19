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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'Auth\UserRegisterController@update_doctor')->name('doctor');

Route::post('/home', 'Auth\UserRegisterController@update_patient')->name('patient');

Auth::routes();

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@adminLogin')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::get('/category/{type}', 'HomeController@category')->name('category');

Route::get('/profile/{cat_email}', 'AppointController@index')->name('profile');

Route::post('/profile/{abc}', 'AppointController@create')->name('appoint');

Route::get('/my_profile', 'HomeController@profile')->name('my_profile');
