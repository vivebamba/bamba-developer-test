<?php

namespace App\Providers;

use App\Interfaces\AuditoriumInterface;
use App\Interfaces\Baseinterface;
use App\Interfaces\BookingInterface;
use App\Interfaces\MovieInterface;
use App\Repositories\AuditoriumRepository;
use App\Repositories\BaseRepository;
use App\Repositories\BookingRepository;
use App\Repositories\MovieRepository;
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
        $this->app->bind(MovieInterface::class, MovieRepository::class);
        $this->app->bind(BookingInterface::class, BookingRepository::class);
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
