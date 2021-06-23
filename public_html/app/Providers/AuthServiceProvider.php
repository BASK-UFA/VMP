<?php

namespace App\Providers;

use App\Models\BlogPost;
use App\Models\EducationCourse;
use App\Models\EducationLesson;
use App\Models\EducationProgram;
use App\Models\Product;
use App\Models\User;
use App\Policies\BlogPostPolicy;
use App\Policies\EducationLessonPolicy;
use App\Policies\EducationProgramPolicy;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        BlogPost::class => BlogPostPolicy::class,
        User::class => UserPolicy::class,
        Product::class => ProductPolicy::class,
        EducationProgram::class => EducationProgramPolicy::class,
        EducationLesson::class => EducationLessonPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
