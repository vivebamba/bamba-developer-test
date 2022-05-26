<?php

namespace App\Repositories;

use App\Interfaces\BookerInterface;
use App\Models\Booker;
use Illuminate\Database\Eloquent\Model;

class BookerRepository extends BaseRepository implements BookerInterface
{
    /**
     * @param Booker $model
     */
    public function __construct(Booker $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $seat
     * @param $booking
     * @return mixed
     */
    public function checkSeatIsAvailable($seat, $booking)
    {
        return $this->model->whereRelation('seats', 'id', $seat)->where('booking_id', $booking)->get()->isEmpty();
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function createWithSeat(array $data, $seat)
    {
        $booker = $this->model->create($data);
        $booker->seats()->attach($seat);
        return $booker;
    }
}
