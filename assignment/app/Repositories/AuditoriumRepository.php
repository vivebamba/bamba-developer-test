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

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $this->model->destroy($id);
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        $this->model->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return void
     */
    public function update($id, array $data)
    {
        $this->model->where('id', $id)->update($data);
    }
}
