<?php

namespace App\Providers;

use App\Interfaces\AuditoriumInterface;
use App\Interfaces\Baseinterface;
use App\Repositories\AuditoriumRepository;
use App\Repositories\BaseRepository;
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
        $this->app->bind(Baseinterface::class, BaseRepository::class);
        $this->app->bind(AuditoriumInterface::class, AuditoriumRepository::class);
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
