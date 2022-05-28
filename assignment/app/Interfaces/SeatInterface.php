<?php

namespace App\Interfaces;

interface SeatInterface
{
    /**
     * @param $booking
     * @return mixed
     */
    public function getAvailableSeatsByBooking($booking);

    /**
     * @param $booking
     * @return mixed
     */
    public function getSeatsByBooking($booking);
}
