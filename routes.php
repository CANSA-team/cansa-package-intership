<?php

use Illuminate\Session\TokenMismatchException;

Route::get('interships',function ()     
{
    return view('package-intership::admin.index');
});


