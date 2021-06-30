<?php

use Illuminate\Session\TokenMismatchException;
use Cansa\Intership\Controllers\Admin\DiaryAdminController;

Route::resource('interships',Cansa\Intership\Controllers\Admin\DiaryAdminController::class);

Route::get('/weeks/{id}', [Cansa\Intership\Controllers\Admin\WeekAdminController::class, 'week'])->name('week');
