<?php

namespace App\Interfaces;

interface MovieInterface
{
    public function getAllHasBookings();

    public function getBySlug($slug);
}
