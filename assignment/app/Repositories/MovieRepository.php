<?php

namespace App\Repositories;

use App\Interfaces\MovieInterface;
use App\Models\Movie;

class MovieRepository extends BaseRepository implements MovieInterface
{
    public function __construct(Movie $model)
    {
        parent::__construct($model);
    }

    public function getAllHasBookings()
    {
        return $this->model->has('bookings')->get();
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

}
