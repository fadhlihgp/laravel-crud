<?php

use Illuminate\Support\Facades\Route;
Route::redirect('/', '/student');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login-action', [\App\Http\Controllers\LoginController::class, 'loginAction'])->name('login-action');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


Route::get('/register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register')->middleware('guest');;
Route::post('/register-action', [\App\Http\Controllers\LoginController::class, 'registerAction'])->name('register-action');

Route::group(['middleware' => ['auth'], 'as' => 'admin'], function (){
    Route::resource('student', \App\Http\Controllers\studentController::class);
});

