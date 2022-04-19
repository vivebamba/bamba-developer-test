<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booker_id',
        'auditorium_id',
        'seat_id',
        'schedule_id',
        'token_id',
        'status',
    ];

    public function booker()
    {
        return $this->belongsTo(Booker::class);
    }
    public function auditorium()
    {
        return $this->belongsTo(Auditorium::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
