<?php

namespace App\Actions\Event;

use App\Models\Event;

class EventDestroyAction
{
    public function __invoke(Event $event): void
    {
        $event->delete();
    }
}
