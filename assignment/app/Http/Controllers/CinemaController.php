<?php

namespace App\Http\Controllers;

use App\Interfaces\MovieInterface;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    private $movieRepository;

    public function __construct(MovieInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function index()
    {
        $data['movies'] = $this->movieRepository->getAll();

        return view('welcome', $data);
    }
}
