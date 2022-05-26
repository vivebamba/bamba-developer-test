<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookersRequest;
use App\Repositories\BookerRepository;
use App\Repositories\SeatRepository;

class BookerController extends Controller
{
    /**
     * @var BookerRepository $bookerRepository
     */
    private $bookerRepository;

    /**
     * @param SeatRepository $seatRepository
     */
    public function __construct(BookerRepository $bookerRepository)
    {
        $this->bookerRepository = $bookerRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBookersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookersRequest $request, $booking)
    {
        if (!$this->bookerRepository->checkSeatIsAvailable($request->seat, $booking)) {
            return back()->with('seat_occupied', 'El asiento esta ocupado ya');
        }

        $createData = [
            'email' => $request->email,
            'name' => $request->name,
            'booking_id' => $booking,
        ];

       $booker = $this->bookerRepository->createWithSeat($createData, $request->seat);

       dd($booker);
    }


}
