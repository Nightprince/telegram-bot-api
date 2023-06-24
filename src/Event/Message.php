<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Event;

use Luzrain\TelegramBotApi\Event;
use Luzrain\TelegramBotApi\Type\Update;

final class Message extends Event
{
    public function executeChecker(Update $update): bool
    {
        return $update->getMessage() !== null;
    }

    public function executeAction(Update $update): mixed
    {
        return $this->callback($update->getMessage());
    }
}