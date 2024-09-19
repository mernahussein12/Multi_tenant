<?php

namespace App\Providers;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Repositories\Eloquent\EloquentStudentRepository;

use App\Repositories\Interfaces\DoctorRepositoryInterface;
use App\Repositories\Eloquent\EloquentDoctorRepository;

use App\Repositories\Interfaces\HRRepositoryInterface;
use App\Repositories\Eloquent\EloquentHRRepository;
use App\Repositories\OrganizationRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(StudentRepositoryInterface::class, EloquentStudentRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, EloquentDoctorRepository::class);
        $this->app->bind(HRRepositoryInterface::class, EloquentHRRepository::class);
        $this->app->singleton(OrganizationRepository::class, function ($app) {
            return new OrganizationRepository();
        });
        }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
