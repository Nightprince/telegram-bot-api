<?php

namespace TelegramBot\Api\Events\Event;

use TelegramBot\Api\BaseMethod;
use TelegramBot\Api\Events\Event;
use TelegramBot\Api\Types\Update;

final class ChatJoinRequest extends Event
{
    public function executeChecker(Update $update): bool
    {
        return $update->getChatJoinRequest() !== null;
    }

    public function executeAction(Update $update): BaseMethod|null
    {
        return $this->callback($update->getChatJoinRequest());
    }
}
