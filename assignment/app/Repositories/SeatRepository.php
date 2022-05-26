<?php

namespace App\Repositories;

use App\Interfaces\SeatInterface;
use App\Models\Seat;
use Illuminate\Database\Eloquent\Builder;

class SeatRepository extends BaseRepository implements SeatInterface
{
    /**
     * @param Seat $model
     */
    public function __construct(Seat $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $booking
     * @return mixed|void
     */
    public function getSeatsByBooking($booking)
    {
        return $this->model->whereHas('auditorium', function (Builder $query) use ($booking) {
            $query->bookings()->where('id', $booking);
        })->whereDoesntHave('bookers', function (Builder $query) use ($booking) {
            $query->where('booking_id', $booking);
        })->get();
    }
}
