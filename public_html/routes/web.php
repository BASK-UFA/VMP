<?php

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('/');

// Аунтификация
Auth::routes();

// Статьи
Route::resource('posts', 'PostController')->names('posts');
Route::get('user/{user}/posts', 'PostController@tag')->name('user.posts');
Route::get('search/posts', 'PostController@search')->name('posts.search');

// Работы
Route::resource('products', 'ProductController')->names('products');
Route::get('user/{user}/products', 'ProductController@tag')->name('user.products');

// Профиль
Route::resource('user', 'UserController')
    ->only('update')
    ->names('user')
    ->middleware('auth');
Route::get('user/{id}', 'UserController@show')->name('user.show');


