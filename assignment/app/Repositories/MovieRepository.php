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

}
