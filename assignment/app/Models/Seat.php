<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * @return hasMany
     */
    public function bookers(): hasMany
    {
        return $this->hasMany(Booker::class);
    }
}
