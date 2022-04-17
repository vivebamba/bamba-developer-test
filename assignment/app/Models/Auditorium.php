<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'total_seats',
        'schedules_ids',
        'status',
    ];
}
