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

## Step 3: Change model providers class Auth aliases to **config/auth.php**
1. 'model' => Cansa\Intership\Models\User::class,

## Step 4: Add middleware in app/Http/Kernel.php

1.  \Illuminate\Session\Middleware\StartSession::class,
1.  \Illuminate\View\Middleware\ShareErrorsFromSession::class,


## Step 5: Delete user and password migration file in database/migrations

## Step 6: add session

1. php artisan session:table

## Step 7: Install publish

1. php artisan vendor:publish --provider="Cansa\Intership\IntershipServiceProvider" --force

## Step 8: Publish the package’s config and assets :

1. php artisan vendor:publish --tag=lfm_config
1. php artisan vendor:publish --tag=lfm_public

## Step 9: Clear cache
1. php artisan route:clear
1. php artisan config:clear
1. php artisan storage:link

## Step 10: Migrate and Seeder
Run the following
1. php artisan migrate
1. php artisan db:seed
