<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function auditorium()
    {
        return $this->belongsTo(Auditorium::class);
    }
}
