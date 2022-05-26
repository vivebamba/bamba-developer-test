<?php

namespace App\Providers;

use App\Interfaces\AuditoriumInterface;
use App\Interfaces\Baseinterface;
use App\Interfaces\BookerInterface;
use App\Interfaces\BookingInterface;
use App\Interfaces\MovieInterface;
use App\Interfaces\SeatInterface;
use App\Repositories\AuditoriumRepository;
use App\Repositories\BaseRepository;
use App\Repositories\BookerRepository;
use App\Repositories\BookingRepository;
use App\Repositories\MovieRepository;
use App\Repositories\SeatRepository;
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
        $this->app->bind(SeatInterface::class, SeatRepository::class);
        $this->app->bind(BookerInterface::class, BookerRepository::class);
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
