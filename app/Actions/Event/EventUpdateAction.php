<?php

namespace App\Actions\Event;

use App\Actions\UploadImageAction;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use Carbon\Carbon;

class EventUpdateAction
{
    public function __invoke(EventUpdateRequest $request, Event $event, UploadImageAction $uploadImage): void
    {
        $updateData = [
            'venue_id' => $request->venue,
            'name' => $request->name,
            'poster' => $request->poster,
            'event_date' => Carbon::parse($request->event_date)->format('Y-m-d'),
        ];

        if($request->hasFile('image')) {
            $updateData['image'] = $uploadImage($request);
        }

        $event->update($updateData);
    }
}
