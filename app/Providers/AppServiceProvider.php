<?php

namespace App\Providers;

use App\Repositories\OrderInterfaces\IorderRepositoryInterface;
use App\Repositories\OrderRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\IorderServices;
use App\Services\OrderServices;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IorderServices::class,OrderServices::class);
        $this->app->bind(IorderRepositoryInterface::class,OrderRepository::class);
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
