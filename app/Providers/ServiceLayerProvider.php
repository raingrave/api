<?php

namespace App\Providers;

use App\Services\Contracts\EventServiceContract;
use App\Services\Contracts\UserServiceContract;
use App\Services\EventService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ServiceLayerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserServiceContract::class, UserService::class);

        $this->app->bind(EventServiceContract::class, EventService::class);
    }
}
