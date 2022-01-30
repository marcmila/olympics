<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Olympics\Domain\Result\ResultRepositoryInterface;
use Olympics\Domain\Staff\StaffRepositoryInterface;
use Olympics\Infrastructure\Repositories\{ResultRepository, StaffRepository};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            StaffRepositoryInterface::class,
            StaffRepository::class
        );

        $this->app->bind(
            ResultRepositoryInterface::class,
            ResultRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
