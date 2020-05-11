<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');/*ffff*/


Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

// Возможность просмотреть статьи пользователей
Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {
    Route::resource('posts', 'PostController')
        ->only('show', 'index')
        ->names('blog.posts');
});

// Возможность просмотреть работы всепользователям
Route::resource('product', 'Blog\ProductController')
    ->only('show', 'index')
    ->names('product');

// Просмотр личных страниц пользователей
Route::resource('user', 'UserController')
    ->only('show', 'index')
    ->names('user');

// REST для личных страниц с middleware
Route::resource('user', 'UserController')
    ->only('update')
    ->names('user')
    ->middleware('user');

// Пользователь
Route::group(['namespace' => 'Blog\User', 'prefix' => 'user/blog', 'middleware' => ['user', 'auth']], function () {

    // Post
    Route::resource('posts', 'PostController')
        ->only(['index', 'edit', 'store', 'update', 'create'])
        ->names('blog.user.posts');

    // Product
    Route::resource('products', 'ProductController')
        ->except(['show'])
        ->names('blog.user.products');
});

// Админка блога
Route::group(['namespace' => 'Blog\Admin', 'prefix' => 'admin/blog', 'middleware' => ['admin', 'auth']], function () {

    // BlogCategory
    Route::resource('categories', 'CategoryController')
        ->only(['index', 'edit', 'store', 'update', 'create'])
        ->names('blog.admin.categories');

    // BlogPost
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');
});


// Работа с коллекциями
Route::group(['prefix' => 'digging_deeper'], function () {
    Route::get('collections', "DiggingDeeperController@collections")
        ->name('digging_deeper.collections');
});


//Route::resource('rest', 'RestTestController')->names('restTest');

