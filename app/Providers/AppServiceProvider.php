<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // User
        $this->app->bind(
            'App\Http\Repositories\Users\Interface\IUserRepository',
            'App\Http\Repositories\Users\UserRepository'
        );

        // Permission
        $this->app->bind(
            'App\Http\Repositories\Permission\Interface\IPermissionRepository',
            'App\Http\Repositories\Permission\PermissionRepository'
        );

        // Course
        $this->app->bind(
            'App\Http\Repositories\Course\Interface\ICourseRepository',
            'App\Http\Repositories\Course\CourseRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
