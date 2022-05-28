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
    public function getAvailableSeatsByBooking($booking)
    {

        return $this->model->whereHas('auditoriums', function (Builder $query) use ($booking) {
            $query->whereRelation('bookings','id', $booking);
        })->whereDoesntHave('bookers', function (Builder $query) use ($booking) {
            $query->where('booking_id', $booking);
        })->get();
    }

    public function getSeatsByBooking($booking)
    {
        return $this->model->whereHas('auditoriums', function (Builder $query) use ($booking) {
            $query->whereRelation('bookings','id', $booking);
        })->get();
    }
}
