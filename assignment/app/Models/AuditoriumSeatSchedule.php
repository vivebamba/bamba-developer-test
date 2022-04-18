<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditoriumSeatSchedule extends Model
{
    use HasFactory;

    protected $table = "auditorium_seat_schedule";

    protected $fillable = [
        'auditorium_id',
        'seat_id',
        'schedule_id',
    ];
}
