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

    public function create(array $data);
}
