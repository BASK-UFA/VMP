<?php

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('/');

// Аунтификация
Auth::routes();

// Статьи
Route::resource('posts', 'PostController')->names('posts');
Route::get('search/posts', 'PostController@search')->name('posts.search');

// Работы
Route::resource('products', 'ProductController')->names('products');

// Профиль
Route::resource('user', 'UserController')
    ->only('index', 'update')
    ->names('user')
    ->middleware('auth');
Route::get('user/{id}', 'UserController@show')->name('user.show');


