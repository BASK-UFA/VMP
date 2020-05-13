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


// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('/');


Auth::routes();


// Общедоступные статьи и работы пользователей
Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {

    // Статьи
    Route::resource('posts', 'PostController')
        ->only('show', 'index')
        ->names('posts');

    // Работы
    Route::resource('products', 'ProductController')
        ->only('show', 'index')
        ->names('products');
});


// Личные страници пользователей
Route::resource('user', 'UserController')
    ->only('show', 'index', 'update')
    ->names('user');


// Маршруты только для пользователей
Route::group(['namespace' => 'Blog\User', 'prefix' => 'user', 'middleware' => ['user', 'auth']], function () {

    // Статьи
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.user.posts');
    Route::get('{id}/posts', 'PostController@show')->name('blog.user.posts.show');

    // Работы
    Route::resource('products', 'ProductController')
        ->except(['show'])
        ->names('blog.user.products');
    Route::get('{id}/products', 'ProductController@show')->name('blog.user.products.show');
});


// Маршруты только для администратора
Route::group(['namespace' => 'Blog\Admin', 'prefix' => 'admin/blog', 'middleware' => ['admin', 'auth']], function () {

    // Статьи
    Route::resource('categories', 'CategoryController')
        ->only(['index', 'edit', 'store', 'update', 'create'])
        ->names('blog.admin.categories');

    // Категории
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');

    // TODO: Сделать маршруты для работы с Product моделью
});

