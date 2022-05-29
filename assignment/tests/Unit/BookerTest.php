<?php

namespace Tests\Unit;

use App\Repositories\BookingRepository;
use App\Repositories\SeatRepository;
use Tests\TestCase;

class BookerTest extends TestCase
{

    /**
     * @var SeatRepository $seatRepository
     */
    private $seatRepository;

    /**
     * @var BookingRepository $bookingRepository
     */
    private $bookingRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bookingRepository = app()->get(BookingRepository::class);
        $this->seatRepository = app()->get(SeatRepository::class);
    }

    /**
     * Test a schedule booking.
     *
     * @return void
     */
    public function test_schedule_booking()
    {
        $booking = $this->bookingRepository->getAll()->random();

        $seats = $this->seatRepository->getAvailableSeatsByBooking($booking->id);

        $data = [
            'name' => 'Prueba',
            'email' => 'prueba@prueba.com',
            'seat' => $seats->first()->id
        ];

        $response = $this->post(route('booker.store', $booking->id), $data);

        $response->assertRedirectContains('success');
    }

    /**
     * Test schedule the same booking
     *
     * @return void
     */
    public function test_schedule_same_booking()
    {
        $booking = $this->bookingRepository->getAll()->random();

        $seats = $this->seatRepository->getAvailableSeatsByBooking($booking->id);

        $data = [
            'name' => 'Prueba',
            'email' => 'prueba@prueba.com',
            'seat' => $seats->first()->id
        ];

        $response = $this->post(route('booker.store', $booking->id), $data);

        $response->assertRedirectContains('success');

        $response = $this->post(route('booker.store', $booking->id), $data);

        $response->assertSessionHas('seat_occupied');
    }

    /**
     * Test limit of auditorium
     *
     * @return void
     */
    public function test_limit_auditorium()
    {
        $booking = $this->bookingRepository->getAll()->random();

        $seats = $this->seatRepository->getAvailableSeatsByBooking($booking->id);

        if($seats->isNotEmpty()){
            foreach ($seats as $seat){
                $data = [
                    'name' => 'Prueba',
                    'email' => 'prueba@prueba.com',
                    'seat' => $seat->id
                ];

                $this->post(route('booker.store', $booking->id), $data);
            }
        }

        $response = $this->get(route('movie.schedule', ['slug' => $booking->movie->slug, 'booking' => $booking->id]));

        $response->assertSessionHas('auditorium_full');

    }
}
