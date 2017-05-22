<?php

namespace App\Providers;

use App\Repositories\Course\CourseRepository;
use App\Repositories\Course\ElequentCourse;
use App\Repositories\Student\ElequentStudent;
use App\Repositories\Student\StudentRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(StudentRepository::class, ElequentStudent::class);
        $this->app->singleton(CourseRepository::class, ElequentCourse::class);
    }
}
