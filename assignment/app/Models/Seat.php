<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'number'
    ];

    /**
     * @return BelongsToMany
     */
    public function auditoriums(): BelongsToMany
    {
        return $this->belongsToMany(Auditorium::class)->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function bookers(): BelongsToMany
    {
        return $this->belongsToMany(Booker::class)->withTimestamps();
    }
}
