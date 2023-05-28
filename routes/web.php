<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\NavigationController@index')->name('index');
Route::get('/about', 'App\Http\Controllers\NavigationController@about')->name('about');
Route::get('/contacts', 'App\Http\Controllers\NavigationController@contacts')->name('contacts');
Route::get('/services', 'App\Http\Controllers\ServiceController@services')->name('services');
Route::get('/entertainment', 'App\Http\Controllers\NavigationController@entertainment')->name('entertainment');
Route::post('/entertainment', 'App\Http\Controllers\NavigationController@findEvents')->name('find_events');
Route::get('/booking', 'App\Http\Controllers\NavigationController@booking')->name('booking');
Route::post('/booking', 'App\Http\Controllers\ReservationController@showRooms')->name('booking_res');
Route::get('/booking_auth', 'App\Http\Controllers\ReservationController@data')->name('booking_repeat');
Route::post('/booking_auth', 'App\Http\Controllers\ReservationController@data')->name('booking_auth');
Route::get('/booking_finish', 'App\Http\Controllers\RegisterController@save')->name('booking_finish_get');
Route::post('/booking_finish', 'App\Http\Controllers\RegisterController@save')->name('booking_finish');
Route::get('/rooms/econom', 'App\Http\Controllers\NavigationController@econom')->name('econom');
Route::post('/rooms/econom', 'App\Http\Controllers\NavigationController@econom')->name('econom');
Route::get('/rooms/family', 'App\Http\Controllers\NavigationController@family')->name('family');
Route::get('/rooms/luxe', 'App\Http\Controllers\NavigationController@luxe')->name('luxe');
Route::get('/rooms/separate', 'App\Http\Controllers\NavigationController@separate')->name('separate');
Route::get('/rooms/standart', 'App\Http\Controllers\NavigationController@standart')->name('standart');
Route::get('/rooms', 'App\Http\Controllers\RoomController@rooms')->name('rooms');


Route::name('user.')->group(function(){
    Route::get('/account', 'App\Http\Controllers\AccountController@index')->middleware('auth')->name('account');
    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route("user.account"));
        }
        return view('login');
    })->name('login');
    //если войдено, но по идее сюда мы не попадем
    Route::get('/registration', function(){
        if(Auth::check()){
            return redirect(route("user.account"));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration',[\App\Http\Controllers\RegisterController::class, 'save']);
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
    Route::get('/logout', function (){
        Auth::logout();
        return redirect('/');
    })->name('logout');
});


Route::put('update/{id}','App\Http\Controllers\AccountController@updateUser')->name('account_update');
Route::post('/booking_login', [\App\Http\Controllers\LoginController::class, 'booking_login_page'])->name('booking_login_page');
Route::get('/booking_login', [\App\Http\Controllers\LoginController::class, 'booking_login_page'])->name('booking_login_page');
Route::post('/booking_login_next', [\App\Http\Controllers\LoginController::class, 'booking_login'])->name('booking_login');
Route::post('/booking_complete', [\App\Http\Controllers\ReservationController::class, 'bookingComplete'])->name('booking_complete');

Route::post('/booking_pay', [\App\Http\Controllers\ReservationController::class, 'bookingPay'])->name('booking_pay');
Route::post('/booking_pre_complete', [\App\Http\Controllers\LoginController::class, 'booking_pre_complete'])->name('booking_pre_complete');
