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
        'name', 'email', 'booking_id'
    ];

    /**
     * @return BelongsToMany
     */
    public function seats(): BelongsToMany
    {
        return $this->belongsToMany(Seat::class)->withTimestamps();
    }

    /**
     * @return BelongsTo
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
