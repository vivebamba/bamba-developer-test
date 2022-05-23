<?php

namespace App\Interfaces;

interface AuditoriumInterface
{
    public function delete($id);

    public function create(array $data);

    public function update($id, array $data);
}
