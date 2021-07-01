# Package Filemanager

* @webiste: http://foostart.com
* @package-name: package-filemanager
* @author: Kang
* @date: 27/12/2017
* @version: 2.0

## Features

1. CRUD
1. Add category to form
1. Language standard
1. Add filters on table data
1. Add token for prevent XSRF

## Step 1: Add service providers to **config/app.php**

1. Cansa\Intership\IntershipServiceProvider::class,
1. Collective\Html\HtmlServiceProvider::class,

## Step 2: Add class aliases to **config/app.php**

1. 'Input' => Illuminate\Support\Facades\Request::class,
1. 'Form' => Collective\Html\FormFacade::class,
1. 'Html' => Collective\Html\HtmlFacade::class,

## Step 3: Delete user and password migration file in database/migrations

## Step 4: Install publish

1. php artisan vendor:publish --provider="Cansa\Intership\IntershipServiceProvider" --force

## Step 5: Publish the package’s config and assets :

1. php artisan vendor:publish --tag=lfm_config
1. php artisan vendor:publish --tag=lfm_public

## Step 6: Clear cache
1. php artisan route:clear
1. php artisan config:clear
1. php artisan storage:link

## Step 7: Migrate and Seeder
Run the following
1. php artisan migrate
1. php artisan db:seed

## Step 8: Add user

foostart\laravel-filemanager\src\Handlers\ConfigHandler.php
```
<?php

namespace Foostart\Filemanager\Handlers;


class ConfigHandler
{
    public function userField()
    {
        //original
        //return auth()->user()->id;
        $auth = \App::make('authenticator');
        $user = $auth->getLoggedUser();
        if (empty($user)) {
            return NULL;
        }
        return $user->id;
    }
}
```