<?php

namespace App\Actions\Venue;

use App\Http\Requests\VenueRequest;
use App\Models\Venue;

class VenueStoreAction
{
    public function __invoke(VenueRequest $request): void
    {
        Venue::query()->create([
            'name' => $request->name,
        ]);
    }
}
