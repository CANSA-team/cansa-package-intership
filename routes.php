<?php

use Illuminate\Session\TokenMismatchException;
use Cansa\Intership\Controllers\Admin\DiaryAdminController;

Route::get('login', [Cansa\Intership\Controllers\UserController::class, 'index'])->name('login.form');
Route::post('log', [Cansa\Intership\Controllers\UserController::class, 'login'])->name('login'); 
Route::get('logout', [Cansa\Intership\Controllers\UserController::class, 'logout'])->name('logout');
Route::get('profile', [Cansa\Intership\Controllers\UserController::class, 'profile'])->name('profile'); 
Route::get('registration', [Cansa\Intership\Controllers\UserController::class, 'registration'])->name('register');