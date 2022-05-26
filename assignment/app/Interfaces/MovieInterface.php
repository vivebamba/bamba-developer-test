<?php

namespace App\Interfaces;

interface MovieInterface
{
    /**
     * @return mixed
     */
    public function getAllHasBookings();

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug);
}
