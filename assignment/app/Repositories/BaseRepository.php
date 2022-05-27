<?php

namespace App\Repositories;

use App\Interfaces\Baseinterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements Baseinterface
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection|Model[]
     */
    public function getAll()
    {
       return $this->model->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
       return $this->model->find($id);
    }
}
