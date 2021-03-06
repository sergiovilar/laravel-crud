# laravel-crud

Create CRUDs (Create, Read, Update, Delete) for your models in Laravel 5 and Lumen.

## Installation

Install via composer:

    composer require sergiovilar/laravel-crud

Copy the contents of the `views` folder to `resources/views`.

### Laravel 5

Add this line to the `bootstrap/app.php` file before the `return $app;`:

    new AdminBootstrap('/app/Admin');

`/app/Admin` should be the folder where you'll put the CRUDs specification.

Add this line to your `app/http/routes.php` file:

    Admin::routes();

### Lumen

Add this line to the `bootstrap/app.php` file before the line containing `$app->group(['namespace' => 'App\Http\Controllers'])`:

    new AdminBootstrap('/app/Admin', $app);

`/app/Admin` should be the folder where you'll put the CRUDs specification.

Add this line to your `app/http/routes.php` file:

    Admin::routes($app);

## Usage

Create a file with the name of the model you want to create the CRUD:

    touch app/Admin/Car.php

Car.php:

    Admin::model('Car')
    ->middleware('admin') // Specify an HTTP Middleware to check if the user is logged
    ->title('Cars') // Title of the page
    ->columns(function(){ // Columns to list the items in this model
        Column::string('model', 'Model'); // field, label
        Column::integer('year', 'Year');
    })->form(function(){
        FormItem::text('model', 'Model'); // field, label
        FormItem::number('year', 'Year');
    });
