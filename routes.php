<?php

use Illuminate\Session\TokenMismatchException;
use Cansa\Intership\Controllers\Admin\DiaryAdminController;

Route::get('login', [Cansa\Intership\Controllers\UserController::class, 'index'])->name('login.form');
Route::post('log', [Cansa\Intership\Controllers\UserController::class, 'login'])->name('login'); 
Route::get('logout', [Cansa\Intership\Controllers\UserController::class, 'logout'])->name('logout');

//profile
Route::get('profile', [Cansa\Intership\Controllers\UserController::class, 'profile'])->name('profile'); 

//register
Route::get('registration', [Cansa\Intership\Controllers\UserController::class, 'registration'])->name('register');
Route::post('regist', [Cansa\Intership\Controllers\UserController::class, 'regist'])->name('regist');

//diaries
Route::get('diaries', [Cansa\Intership\Controllers\DiariesController::class, 'index'])->name('diaries');

//create diary
Route::get('diary/create', [Cansa\Intership\Controllers\DiariesController::class, 'create'])->name('diary.create');
Route::post('diaries/cr', [Cansa\Intership\Controllers\DiariesController::class, 'createDiary'])->name('diary.store');

//update diary
Route::get('diaries/update', [Cansa\Intership\Controllers\DiariesController::class, 'edit'])->name('diary.edit');
Route::post('diaries/ud', [Cansa\Intership\Controllers\DiariesController::class, 'update'])->name('diary.update');


//delete diary
Route::get('diaries/delete', [Cansa\Intership\Controllers\DiariesController::class, 'delete'])->name('diary.delete');