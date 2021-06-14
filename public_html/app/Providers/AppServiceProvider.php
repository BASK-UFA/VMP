<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\EducationLesson;
use App\Models\EducationProgram;
use App\Models\Product;
use App\Models\User;
use App\Models\UserEducationCourse;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogPostObserver;
use App\Observers\EducationLessonObserver;
use App\Observers\EducationProgramObserver;
use App\Observers\ProductObserver;
use App\Observers\UserEducationCourseObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BlogPost::observe(BlogPostObserver::class);
        Product::observe(ProductObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
        User::observe(UserObserver::class);
        EducationProgram::observe(EducationProgramObserver::class);
        EducationLesson::observe(EducationLessonObserver::class);
        UserEducationCourse::observe(UserEducationCourseObserver::class);
    }
}
