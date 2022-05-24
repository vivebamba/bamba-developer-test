<?php

namespace App\Http\Controllers;

use App\Interfaces\BookingInterface;
use App\Interfaces\MovieInterface;
use App\Repositories\BookingRepository;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * @var MovieInterface $movieRepository
     */
    private $movieRepository;

    /**
     * @var BookingInterface $bookingRepository
     */
    private $bookingRepository;

    /**
     * @param MovieInterface $movieRepository
     * @param BookingInterface $bookingRepository
     */
    public function __construct(MovieInterface $movieRepository, BookingInterface $bookingRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['movies'] = $this->movieRepository->getAllHasBookings();

        return view('welcome', $data);
    }

    /**
     * @param $slugMovie
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showTimesOfMovie($slugMovie)
    {
        if (empty($data['movie'] = $this->movieRepository->getBySlug($slugMovie))) {
            return abort(404);
        }

        $data['times'] = $this->bookingRepository->getBookingByMovie($slugMovie)->groupBy('day');

        return view('movie', $data);
    }
}
