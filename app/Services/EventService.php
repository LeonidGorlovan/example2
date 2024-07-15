<?php

namespace App\Services;

use App\Models\Event;
use LaravelIdea\Helper\App\Models\_IH_Venue_C;

class EventService
{
    public function one($id): _IH_Venue_C|Event|array|null
    {
        return Event::query()->find($id);
    }

    public function store(array $data, string $nameImg): void
    {
        Event::query()->create([
            'venue_id' => $data['venue'],
            'name' => $data['name'],
            'poster' => $data['poster'],
            'event_date' => $data['event_date'],
            'image' => $nameImg
        ]);
    }

    public function update(array $data, $id, null|string $nameImg): void
    {
        $updateData = [
            'venue_id' => $data['venue'],
            'name' => $data['name'],
            'poster' => $data['poster'],
            'event_date' => $data['event_date'],
        ];

        if(!empty($nameImg)) {
            $updateData['image'] = $nameImg;
        }

        Event::query()->where('id', $id)->update($updateData);
    }

    public function destroy(int $id): void
    {
        Event::query()->where('id', $id)->delete();
    }
}
