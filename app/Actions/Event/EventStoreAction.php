<?php

namespace App\Actions\Event;

use App\Actions\UploadImageAction;
use App\Http\Requests\EventStoreRequest;
use App\Models\Event;
use Carbon\Carbon;

class EventStoreAction
{
    public function __invoke(EventStoreRequest $request, UploadImageAction $uploadImage): void
    {
        Event::query()->create([
            'venue_id' => $request->venue,
            'name' => $request->name,
            'poster' => $request->poster,
            'event_date' => Carbon::parse($request->event_date)->format('Y-m-d'),
            'image' => $uploadImage($request)
        ]);
    }
}
