<?php

use Illuminate\Session\TokenMismatchException;
use Cansa\Intership\Controllers\Admin\DiaryAdminController;

Route::get('login', [Cansa\Intership\Controllers\UserController::class, 'index'])->name('login');
Route::post('custom-login', [Cansa\Intership\Controllers\UserController::class, 'login'])->name('login.custom'); 
Route::get('registration', [Cansa\Intership\Controllers\UserController::class, 'registration'])->name('register.user');