<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property int id
 * @property int venue_id
 * @property string name
 * @property string poster
 * @property Carbon event_date
 * @property Carbon created_at
 * @property Carbon updated_at
 */

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'venue_id',
        'name',
        'poster',
        'event_date',
        'image',
        'created_at',
        'updated_at',
    ];

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    protected function eventDate(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }
}
