<?php

namespace App\Http\Controllers\API;

use App\Models\Booker;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    /**
     * Store a newly created Booking in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $data = $request->all();
        $booker = Booker::create($data);

        $booking = [];
        $allSeats = [];
        $token_id = uniqid();
            $seats = $data['seats_ids'];
            foreach ($seats as $key => $seat) {
                $seatArr = [
                    'booker_id' => $booker->id,
                    'auditorium_id' => $data['auditorium_id'],
                    'seat_id' => $seat,
                    'schedule_id' => $data['schedule_id'],
                    'token_id' => $token_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                array_push($allSeats, $seatArr);
            }
            if (count($allSeats) == count($seats)) {
                $booking = Booking::insert($allSeats);
            }
        
        return response()->json(['token_id' => $token_id]);
    }

    /**
     * Display the Boiking by token string.
     * @param  String  $token
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {

        $bookings = Booking::where('token_id', $token)->with('booker', 'auditorium', 'schedule', 'seat')->get();
        $seats = [];
            foreach ($bookings as $key => $booking) {
            $seat = $booking->seat ? $booking->seat->name : '';
            array_push($seats, $seat);
        };
        $tiket = [
            'email' => $bookings[0]->booker->email,
            'auditorium_name' => $bookings[0]->auditorium->name,
            'schedule_name' => $bookings[0]->schedule->start_time,
            'seats_names' => $seats,
        ];

        return response()->json(['tiket' => $tiket]);

    }
}
