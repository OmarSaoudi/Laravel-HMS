<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\DoctorRepositoryInterface', 'App\Repository\DoctorRepository');
        $this->app->bind('App\Repository\NurseRepositoryInterface', 'App\Repository\NurseRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
