<?php

namespace App\Repositories;

use App\Entities\Event;
use App\Repositories\Contracts\EventRepositoryContract;

/**
 * Class EventRepository
 * @package App\Repositories
 */
class EventRepository extends Repository implements EventRepositoryContract
{
    /**
     * EventRepository constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        parent::__construct($event);
    }
}
