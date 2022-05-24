<?php

namespace App\Http\Controllers;

use App\Repositories\BookingRepository;
use App\Repositories\MovieRepository;
use App\Repositories\SeatRepository;

class CinemaController extends Controller
{
    /**
     * @var MovieRepository $movieRepository
     */
    private $movieRepository;

    /**
     * @var BookingRepository $bookingRepository
     */
    private $bookingRepository;

    /**
     * @var SeatRepository $seatRepository
     */
    private $seatRepository;

    /**
     * @param MovieRepository $movieRepository
     * @param BookingRepository $bookingRepository
     */
    public function __construct(MovieRepository $movieRepository, BookingRepository $bookingRepository,
                                SeatRepository  $seatRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->bookingRepository = $bookingRepository;
        $this->seatRepository = $seatRepository;
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
            abort(404);
        }

        $data['times'] = $this->bookingRepository->getBookingByMovie($slugMovie)->groupBy('day');

        return view('movie', $data);
    }

    public function showSeatsOfMovieBooking($booking)
    {

    }
}
