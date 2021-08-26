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
    Route::get('/withdraw-funds', 'UserController@withdraw')->name('user.withdraw');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'AdminController@home')->name('admin.home');
    Route::get('/users', 'AdminController@users')->name('admin.users');
    Route::get('/settings', 'AdminController@settings')->name('admin.settings');
    Route::post('/settings', 'AdminController@updateSettings')->name('admin.settings');
    Route::post('/countdown', 'AdminController@updateCountdown')->name('admin.update-countdown');
    Route::get('/withdrawals', 'AdminController@withdrawals')->name('admin.withdrawals');
    Route::get('/confirm/{txn}', 'AdminController@confirmWithdraw')->name('withdraw.confirm');
});
