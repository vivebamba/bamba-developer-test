<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'booking_id', 'seat_id'
    ];

    /**
     * @return belongsTo
     */
    public function seat(): belongsTo
    {
        return $this->belongsTo(Seat::class);
    }

    /**
     * @return BelongsTo
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
