<?php

namespace Tests\Unit;

use App\Repositories\BookingRepository;
use Tests\TestCase;

class BookingTest extends TestCase
{
    /**
     * @var BookingRepository $bookingRepository
     */
    private $bookingRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bookingRepository = app()->get(BookingRepository::class);
    }

    /**
     * Test Evening Hours
     *
     * @return void
     */
    public function test_evening_hours()
    {
        $bookings = $this->bookingRepository->getAll();

        $bookingFilter = $bookings->filter(function ($value, $key){
           return $value->time === '11:30';
        })->groupBy('day')->keys();


        $this->assertContains('Sábado', $bookingFilter);
        $this->assertContains('Domingo', $bookingFilter);
    }
}
