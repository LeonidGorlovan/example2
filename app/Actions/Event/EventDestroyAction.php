<?php

namespace App\Actions\Event;

use App\Actions\DestroyImageAction;
use App\Models\Event;

class EventDestroyAction
{
    public function __invoke(Event $event, DestroyImageAction $destroyImage): void
    {
        $destroyImage($event->image);
        $event->delete();
    }
}
