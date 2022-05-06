<?php

namespace TelegramBot\Api\Events;

use Closure;
use ReflectionFunction;
use TelegramBot\Api\Types\Update;

class EventCollection
{
    /**
     * Array of events.
     *
     * @var array
     */
    protected $events;

    /**
     * EventCollection constructor.
     */
    public function __construct()
    {
    }

    /**
     * Add new event to collection
     *
     * @param Closure $event
     * @param Closure|null $checker
     *
     * @return \TelegramBot\Api\Events\EventCollection
     */
    public function add(Closure $event, $checker = null)
    {
        $this->events[] = !is_null($checker) ? new Event($event, $checker)
            : new Event($event, function () {
            });

        return $this;
    }

    /**
     * @param \TelegramBot\Api\Types\Update
     */
    public function handle(Update $update)
    {
        foreach ($this->events as $event) {
            /* @var \TelegramBot\Api\Events\Event $event */
            if ($event->executeChecker($update) === true) {
                if (false === $event->executeAction($update)) {
                    break;
                }
            }
        }
    }
}
