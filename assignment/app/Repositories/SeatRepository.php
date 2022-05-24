<?php

namespace App\Repositories;

use App\Interfaces\SeatInterface;
use App\Models\Seat;

class SeatRepository extends BaseRepository implements SeatInterface
{
    public function __construct(Seat $model)
    {
        parent::__construct($model);
    }
}
