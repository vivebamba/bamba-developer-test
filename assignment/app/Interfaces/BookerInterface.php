<?php

namespace App\Interfaces;

interface BookerInterface
{
    /**
     * @param $seat
     * @param $booking
     * @return mixed
     */
    public function checkSeatIsAvailable($seat, $booking);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $booking
     * @return mixed
     */
    public function getBookersByBooking($booking);
}
