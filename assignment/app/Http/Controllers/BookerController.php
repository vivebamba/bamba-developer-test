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
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookersRequest $request, $booking)
    {
        if(!$this->bookerRepository->checkSeatIsAvailable($request->seat, $booking)){
            echo 'hola';
        }



    }


}
