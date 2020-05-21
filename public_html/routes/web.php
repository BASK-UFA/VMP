<?php

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('/');

// Аунтификация
Auth::routes();

// Общедоступные статьи и работы пользователей
//Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {
//
//    // Статьи
//    Route::resource('posts', 'PostController')
//        ->only('show', 'index')
//        ->names('posts');
//
//    Route::get('search/posts', 'PostController@search')->name('posts.search');
//
//    // Работы
//    Route::resource('products', 'ProductController')
//        ->only('show', 'index')
//        ->names('products');
//});


// Статьи
Route::resource('posts', 'PostController')->names('posts');
Route::get('search/posts', 'PostController@search')->name('posts.search');
//Route::get('{id}/posts', 'PostController@show')->name('blog.user.posts.show');


// Работы
Route::resource('products', 'ProductController')->names('products');
//Route::get('{id}/products', 'ProductController@show')->name('blog.user.products.show');


// Профиль
Route::resource('user', 'UserController')
    ->only('index', 'update')
    ->names('user')
    ->middleware('auth');
Route::get('user/{id}', 'UserController@show')->name('user.show');


// Маршруты только для пользователей
//Route::group(['namespace' => 'Blog\User', 'prefix' => 'user', 'middleware' => ['user', 'auth']], function () {
//
//    // Статьи
//    Route::resource('posts', 'PostController')
//        ->except(['show'])
//        ->names('blog.user.posts');
//    Route::get('{id}/posts', 'PostController@show')->name('blog.user.posts.show');
//
//    // Работы
//    Route::resource('products', 'ProductController')
//        ->except(['show'])
//        ->names('blog.user.products');
//    Route::get('{id}/products', 'ProductController@show')->name('blog.user.products.show');
//});

