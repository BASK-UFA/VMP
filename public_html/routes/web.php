<?php

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('/');

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

// Администратор
Route::prefix('admin')->middleware('role:admin')->group(
    function () {
        Route::get(
            '/home',
            function () {
                return redirect()->route('admin.index');
            }
        );
        Route::get('/', 'Admin\HomeController@index')->name('admin.index');
        Route::get('posts', 'Admin\AllPost')->name('admin.posts');
        Route::get('products', 'Admin\AllProduct')->name('admin.products');
    }
);

// Учитель
Route::prefix('teacher')->middleware('role:teacher')->group(
    function () {
        Route::get(
            '/home',
            function () {
                return redirect()->route('teacher.index');
            }
        );

        Route::get('/', 'Teacher\HomeController@index');
    }
);

// Образование
Route::prefix('education')->group(
    function () {
        Route::get(
            'web-programming',
            function () {
                return view('education.web');
            }
        )->name('education.web');
        Route::get(
            'network-systems-administration',
            function () {
                return 1;
            }
        )->name('education.system');
        Route::get(
            'school-of-young-programmer',
            function () {
                return 1;
            }
        )->name('education.school');
    }
);
