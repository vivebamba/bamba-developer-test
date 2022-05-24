<?php

namespace App\Repositories;

use App\Interfaces\MovieInterface;
use App\Models\Movie;

class MovieRepository extends BaseRepository implements MovieInterface
{
    /**
     * @param Movie $model
     */
    public function __construct(Movie $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getAllHasBookings()
    {
        return $this->model->has('bookings')->get();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

}
