<?php

namespace App\Interfaces;

interface BookingInterface
{
    /**
     * @param $movie
     * @return mixed
     */
    public function getBookingByMovieAndGroupByDay($movie);

}
