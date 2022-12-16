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
        $this->app->bind('App\Repository\PatientRepositoryInterface', 'App\Repository\PatientRepository');
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
