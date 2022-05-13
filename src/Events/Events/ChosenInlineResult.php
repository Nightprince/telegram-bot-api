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
        $this->getAction()($update->getChosenInlineResult());

        return false;
    }
}