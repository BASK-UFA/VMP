<?php

// Главная страница
Route::get(
    '/',
    function () {
        $blogPosts = \App\Models\BlogPost::latest()->take(3)->get();
        return view('layouts.new', compact('blogPosts'));
    }
)->name('/');

Auth::routes();

Route::get(
    '/home',
    function () {
        return redirect()->route('posts.index');
    }
);

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

        Route::get('/', 'Teacher\HomeController@index')->name('teacher.index');
        Route::resource('programs', 'Teacher\EducationProgramController')->names('teacher.programs');
        Route::resource('lessons', 'Teacher\EducationLessonController')->names('teacher.lessons');
    }
);

// Образование
Route::prefix('education')->group(
    function () {
        Route::resource('programs', 'EducationProgramController')->names('education.programs');
        Route::resource('lessons', 'EducationLessonController')->names('education.lessons');

        Route::get(
            'web-programming',
            function () {
                return view('education.web');
            }
        )->name('education.web');
        Route::get(
            'network-systems-administration',
            function () {
                return view('education.network');
            }
        )->name('education.system');
        Route::get(
            'school-of-young-programmer',
            function () {
                return view('education.school');
            }
        )->name('education.school');
    }
);

// Курсы
Route::resource('user-course', 'UserEducationCourseController');

// new
//Route::get('new', function () {
//   return view('layouts.new');
//});
