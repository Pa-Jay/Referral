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
    return redirect()->route('login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/credit-ref', 'HomeController@creditRef')->name('home');

Auth::routes(['verify' => true]);

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', 'UserController@index')->name('user.home');
    Route::get('/referrals', 'UserController@referrals')->name('user.referrals');
    Route::view('/profile', 'user.profile')->name('user.profile');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@home')->name('admin.home');
});
