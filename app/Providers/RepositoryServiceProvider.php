<?php

namespace App\Providers;

use App\Repositories\Contracts\EventRepositoryContract;
use App\Repositories\Contracts\RepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\EventRepository;
use App\Repositories\Repository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(RepositoryContract::class, Repository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(EventRepositoryContract::class, EventRepository::class);
    }
}
