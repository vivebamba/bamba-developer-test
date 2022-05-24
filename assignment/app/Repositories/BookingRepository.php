<?php

namespace App\Repositories;

use App\Interfaces\BookingInterface;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder;

class BookingRepository extends BaseRepository implements BookingInterface
{
    /**
     * @param Booking $model
     */
    public function __construct(Booking $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $slugMovie
     * @return mixed
     */
    public function getBookingByMovie($slugMovie)
    {
       return $this->model->whereHas('movie', function (Builder $query) use ($slugMovie){
            $query->where('slug', $slugMovie);
        })->get();
    }
}
