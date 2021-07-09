<?php
Route::fallback('GeneralController@error');
//login
Route::group([
    'middleware' => [],
    'namespace' => 'Cansa\Intership\Controllers',
], function () {
    Route::get('login', [
        'as' => 'login.form',
        'uses' => 'UserController@index'
    ]);
    
    Route::post('log', [
        'as' => 'login',
        'uses' => 'UserController@login'
    ]);
    
    Route::get('logout', [
        'as' => 'logout',
        'uses' => 'UserController@logout'
    ]);
    Route::get('registration', [
        'as' => 'register',
        'uses' => 'UserController@registration'
    ]);

    Route::post('regist', [
        'as' => 'regist',
        'uses' => 'UserController@regist'
    ]);
});

//web
Route::group([
    'middleware' => ['Cansa\Intership\Middleware\CheckAuth'],
    'namespace' => 'Cansa\Intership\Controllers',
], function () {

    Route::get('profile', [
        'as' => 'profile',
        'uses' => 'UserController@profile'
    ]);

    /**
     * diaries
     */
    Route::get('diaries', [
        'as' => 'diaries',
        'uses' => 'DiariesController@index'
    ]);

    Route::get('diary/create', [
        'as' => 'diary.create',
        'uses' => 'DiariesController@create'
    ]);

    Route::post('diaries/cr', [
        'as' => 'diary.store',
        'uses' => 'DiariesController@createDiary'
    ]);

    Route::get('diaries/update', [
        'as' => 'diary.edit',
        'uses' => 'DiariesController@edit'
    ]);

    Route::post('diaries/ud', [
        'as' => 'diary.update',
        'uses' => 'DiariesController@update'
    ]);

    Route::get('diaries/delete', [
        'as' => 'diary.delete',
        'uses' => 'DiariesController@delete'
    ]);

    Route::get('diaries/search', [
        'as' => 'diary.search',
        'uses' => 'DiariesController@search'
    ]);

    Route::post('diaries/status', [
        'as' => 'diary.status',
        'uses' => 'DiariesController@changeStatus'
    ]);

    /**
    * week
    */
    Route::get('weeks', [
        'as' => 'weeks',
        'uses' => 'WeeksController@index'
    ]);

    Route::get('weeks/create', [
        'as' => 'weeks.create',
        'uses' => 'WeeksController@create'
    ]);

    Route::post('week/cr', [
        'as' => 'week.store',
        'uses' => 'WeeksController@createWeek'
    ])->middleware('Cansa\Intership\Middleware\CheckDay');

    Route::get('week/update', [
        'as' => 'week.edit',
        'uses' => 'WeeksController@edit'
    ]);

    Route::post('week/ud', [
        'as' => 'week.update',
        'uses' => 'WeeksController@update'
    ])->middleware('Cansa\Intership\Middleware\CheckDay');

    Route::get('week/delete', [
        'as' => 'week.delete',
        'uses' => 'WeeksController@delete'
    ]);

    Route::get('week/search', [
        'as' => 'week.search',
        'uses' => 'WeeksController@search'
    ]);

    Route::post('week/status', [
        'as' => 'week.status',
        'uses' => 'WeeksController@changeStatus'
    ]);

    Route::post('week/status-check', [
        'as' => 'week.status-check',
        'uses' => 'WeeksController@changeStatusCheck'
    ]);

    /**
     * Diary Content
     */
    Route::get('diary-content', [
        'as' => 'diary-content',
        'uses' => 'DiaryContentController@index'
    ]);

    Route::get('diary-content/create', [
        'as' => 'diary-content.create',
        'uses' => 'DiaryContentController@create'
    ]);

    Route::post('diary-content/cr', [
        'as' => 'diary-content.store',
        'uses' => 'DiaryContentController@createDiaryContent'
    ]);

    Route::get('diary-content/update', [
        'as' => 'diary-content.edit',
        'uses' => 'DiaryContentController@edit'
    ]);

    Route::post('diary-content/ud', [
        'as' => 'diary-content.update',
        'uses' => 'DiaryContentController@update'
    ]);

    Route::get('diary-content/delete', [
        'as' => 'diary-content.delete',
        'uses' => 'DiaryContentController@delete'
    ]);

    Route::get('diary-content/search', [
        'as' => 'diary-content.search',
        'uses' => 'DiaryContentController@search'
    ]);

    Route::post('diary-content/status', [
        'as' => 'diary-content.status',
        'uses' => 'DiaryContentController@changeStatus'
    ]);

    /**
     * comment
     */
    Route::get('comment', [
        'as' => 'comment',
        'uses' => 'CommentController@index'
    ]);

    Route::get('comment/create', [
        'as' => 'comment.create',
        'uses' => 'CommentController@create'
    ]);

    Route::post('comment/cr', [
        'as' => 'comment.store',
        'uses' => 'CommentController@createComment'
    ]);

    Route::get('comment/update', [
        'as' => 'comment.edit',
        'uses' => 'CommentController@edit'
    ]);

    Route::post('comment/ud', [
        'as' => 'comment.update',
        'uses' => 'CommentController@update'
    ]);

    Route::get('comment/delete', [
        'as' => 'comment.delete',
        'uses' => 'CommentController@delete'
    ]);

    Route::get('comment/search', [
        'as' => 'comment.search',
        'uses' => 'CommentController@search'
    ]);

    Route::post('comment/status', [
        'as' => 'comment.status',
        'uses' => 'CommentController@changeStatus'
    ]);
});