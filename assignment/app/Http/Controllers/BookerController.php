<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookersRequest;
use App\Repositories\BookerRepository;
use Illuminate\Support\Facades\Log;

class BookerController extends Controller
{
    /**
     * @var BookerRepository $bookerRepository
     */
    private BookerRepository $bookerRepository;

    /**
     * @param BookerRepository $bookerRepository
     */
    public function __construct(BookerRepository $bookerRepository)
    {
        $this->bookerRepository = $bookerRepository;
    }


    /**
     * @param StoreBookersRequest $request
     * @param $booking
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|void
     */
    public function store(StoreBookersRequest $request, $booking)
    {
        if (!$this->bookerRepository->checkSeatIsAvailable($request->seat, $booking)) {
            return back()->with('seat_occupied', 'El asiento esta ocupado ya');
        }

        try {
            $createData = [
                'email' => $request->email,
                'name' => $request->name,
                'booking_id' => $booking,
            ];

            $data['booker'] = $this->bookerRepository->createWithSeat($createData, $request->seat);

            return view('success', $data);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }

    }


}
