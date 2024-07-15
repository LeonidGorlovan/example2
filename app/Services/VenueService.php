<?php

namespace App\Services;

use App\Models\Venue;
use Illuminate\Database\Eloquent\Collection;
use LaravelIdea\Helper\App\Models\_IH_Venue_C;

class VenueService
{
    public function all(): Collection|array
    {
        return Venue::query()->get();
    }

    public function one($id): _IH_Venue_C|Venue|array|null
    {
        return Venue::query()->find($id);
    }

    public function store(array $data): void
    {
        Venue::query()->create([
            'name' => $data['name'],
        ]);
    }

    public function update(array $data, int $id): void
    {
        Venue::query()->where('id', $id)->update([
            'name' => $data['name'],
        ]);
    }

    public function destroy(int $id): void
    {
        Venue::query()->where('id', $id)->delete();
    }
}
