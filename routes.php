<?php

use Illuminate\Session\TokenMismatchException;
use Cansa\Intership\Controllers\Admin\DiaryAdminController;

Route::get('login', [Cansa\Intership\Controllers\UserController::class, 'index'])->name('login');
