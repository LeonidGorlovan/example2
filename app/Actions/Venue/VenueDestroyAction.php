<?php

namespace App\Actions\Venue;

use App\Models\Venue;

class VenueDestroyAction
{
    public function __invoke(Venue $venue): void
    {
        $venue->delete();
    }
}
