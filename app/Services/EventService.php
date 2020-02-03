<?php

namespace App\Services;

use App\Entities\Event;
use App\Services\Contracts\EventServiceContract;

class EventService implements EventServiceContract
{
    protected $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function getAll()
    {
        return $this->event->all();
    }
}
