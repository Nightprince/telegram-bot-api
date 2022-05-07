<?php

namespace TelegramBot\Api\Events\Events;

use TelegramBot\Api\Events\Event;
use TelegramBot\Api\Types\Update;

final class ChosenInlineResult extends Event
{
    public function executeChecker(Update $update): bool
    {
        return $update->getChosenInlineResult() !== null;
    }

    public function executeAction(Update $update): bool
    {
        if (!$update->getChosenInlineResult()) {
            return true;
        }

        $reflectionAction = new ReflectionFunction($this->getAction());
        $reflectionAction->invokeArgs([$update->getChosenInlineResult()]);

        return false;
    }
}
