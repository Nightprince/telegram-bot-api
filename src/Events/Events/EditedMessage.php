<?php

namespace TelegramBot\Api\Events\Events;

use TelegramBot\Api\Events\Event;
use TelegramBot\Api\Types\Update;

final class EditedMessage extends Event
{
    public function executeChecker(Update $update): bool
    {
        return $update->getEditedMessage() !== null;
    }

    public function executeAction(Update $update): bool
    {
        if (!$update->getEditedMessage()) {
            return true;
        }

        $reflectionAction = new ReflectionFunction($this->getAction());
        $reflectionAction->invokeArgs([$update->getEditedMessage()]);

        return false;
    }
}
