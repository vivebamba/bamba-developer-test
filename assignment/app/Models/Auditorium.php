<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    use HasFactory;
    protected $table = "auditoriums";

    protected $fillable = [
        'name',
        'total_seats',
        'status',
    ];

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);
    }
    public function seats()
    {
        return $this->belongsToMany(Seat::class);
    }
}
