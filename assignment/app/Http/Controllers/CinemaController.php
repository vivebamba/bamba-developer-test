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
    private MovieRepository $movieRepository;

    /**
     * @var BookingRepository $bookingRepository
     */
    private BookingRepository $bookingRepository;

    /**
     * @var SeatRepository $seatRepository
     */
    private SeatRepository $seatRepository;

    /**
     * @param MovieRepository $movieRepository
     * @param BookingRepository $bookingRepository
     * @param SeatRepository $seatRepository
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

        $data['times'] = $this->bookingRepository->getBookingByMovieAndGroupByDay($slugMovie);

        return view('movie', $data);
    }


    /**
     * @param $slugMovie
     * @param $booking
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function scheduleMovieBooking($slugMovie, $booking)
    {
        $data['booking'] = $this->bookingRepository->getById($booking);

        if (empty($data['booking'])) {
            abort(404);
        }

        $data['seats'] = $this->seatRepository->getSeatsByBooking($booking);

        return view('schedule', $data);
    }
}
