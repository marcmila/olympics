<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Olympics\Domain\Staff\StaffRepositoryInterface;
use Olympics\Infrastructure\Repositories\StaffRepository;

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
