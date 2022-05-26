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
     * @param $seat
     * @return mixed
     */
    public function createWithSeat(array $data, $seat);
}
