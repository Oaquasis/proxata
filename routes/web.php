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

Route::get('/', 'HomeController@index')->name('home');

// Authentication Routes...
Route::get('/auth', function(){
    if(Illuminate\Support\Facades\Auth::check()){
        return response("Authenticated", 200);
    }else{
        return response("Authentication Required", 401);
    }
})->name('isAuthenticated');

$this->get('login/{redirectTo?}', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin');
});

//Route::get('/home', 'HomeController@index')->name('home');//
