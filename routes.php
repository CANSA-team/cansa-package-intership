<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('interships', [
    'as' => 'post',
    'uses' => 'Foostart\Post\Controllers\Front\PostFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
                  'namespace' => 'Foostart\Post\Controllers\Admin',
        ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage post
          |-----------------------------------------------------------------------
          | 1. List of posts
          | 2. Edit post
          | 3. Delete post
          | 4. Add new post
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/interships', [
            'as' => 'interships.list',
            'uses' => 'PostAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/interships/edit', [
            'as' => 'interships.edit',
            'uses' => 'PostAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/interships/copy', [
            'as' => 'interships.copy',
            'uses' => 'PostAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/interships/edit', [
            'as' => 'interships.post',
            'uses' => 'PostAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/interships/delete', [
            'as' => 'interships.delete',
            'uses' => 'PostAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/interships/trash', [
            'as' => 'interships.trash',
            'uses' => 'PostAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/interships/config', [
            'as' => 'interships.config',
            'uses' => 'PostAdminController@config'
        ]);

        Route::post('admin/interships/config', [
            'as' => 'interships.config',
            'uses' => 'PostAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/interships/lang', [
            'as' => 'interships.lang',
            'uses' => 'PostAdminController@lang'
        ]);

        Route::post('admin/interships/lang', [
            'as' => 'interships.lang',
            'uses' => 'PostAdminController@lang'
        ]);

    });
});
