<?php

namespace App\Actions\Venue;

use App\Http\Requests\VenueRequest;
use App\Models\Venue;

class VenueUpdateAction
{
    public function __invoke(Venue $venue, VenueRequest $request): void
    {
        $venue->update([
            'name' => $request->name,
        ]);
    }
}
