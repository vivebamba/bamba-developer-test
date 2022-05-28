<?php

namespace App\Http\Controllers;

use App\Repositories\BookerRepository;
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
     * @var BookerRepository $bookerRepository
     */
    private BookerRepository $bookerRepository;

    /**
     * @param MovieRepository $movieRepository
     * @param BookingRepository $bookingRepository
     * @param SeatRepository $seatRepository
     */
    public function __construct(MovieRepository $movieRepository, BookingRepository $bookingRepository,
                                SeatRepository  $seatRepository, BookerRepository $bookerRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->bookingRepository = $bookingRepository;
        $this->seatRepository = $seatRepository;
        $this->bookerRepository = $bookerRepository;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function scheduleMovieBooking($slugMovie, $booking)
    {
        $data['booking'] = $this->bookingRepository->getById($booking);

        if (empty($data['booking'])) {
            abort(404);
        }

        if ($this->bookerRepository->getBookersByBooking($booking)->count() === $this->seatRepository->getSeatsByBooking($booking)->count()) {
            return back()->with('auditorium_full', 'La sala con el horario de ' . $data['booking']->day . ' a las '. $data['booking']->time .' ya esta llena');
        }

        $data['seats'] = $this->seatRepository->getAvailableSeatsByBooking($booking);

        return view('schedule', $data);
    }
}
