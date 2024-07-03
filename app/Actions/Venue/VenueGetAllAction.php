<?php

namespace App\Actions\Venue;

use App\Models\Venue;
use Illuminate\Database\Eloquent\Collection;

class VenueGetAllAction
{
    public function __invoke(): Collection
    {
        return Venue::query()->get();
    }
}
