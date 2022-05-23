<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'day', 'time', 'auditorium_id', 'movie_id'
    ];

    /**
     * @return BelongsTo
     */
    public function auditorium(): BelongsTo
    {
        return $this->belongsTo(Auditorium::class);
    }

    /**
     * @return BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    /**
     * @return HasMany
     */
    public function booker(): HasMany
    {
        return $this->hasMany(Booker::class);
    }
}
