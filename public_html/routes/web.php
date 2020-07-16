<?php

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('/');

// Аунтификация
Auth::routes();

// Статьи
Route::resource('posts', 'PostController')->names('posts');
Route::get('user/{user}/posts', 'AllPostUser')->name('user.posts');
Route::get('search/posts', 'PostController@search')->name('posts.search');

// Работы
Route::resource('products', 'ProductController')->names('products');
Route::get('user/{user}/products', 'AllProductUser')->name('user.products');

// Профиль
Route::patch('user/{id}', 'UserController@update')->name('user.update')->middleware('auth');
Route::get('user/{id}', 'UserController@show')->name('user.show');

// Изображения
Route::resource('upload', 'ImageController@upload')
    ->only('store')
    ->middleware('auth')
    ->names('image');
