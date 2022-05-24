<?php

namespace App\Repositories;

use App\Interfaces\AuditoriumInterface;
use App\Models\Auditorium;

class AuditoriumRepository extends BaseRepository implements AuditoriumInterface
{
    public function __construct(Auditorium $model)
    {
        parent::__construct($model);
    }

}
