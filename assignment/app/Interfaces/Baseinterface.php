<?php

namespace App\Interfaces;

interface Baseinterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);
}
