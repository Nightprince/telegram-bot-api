<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type;

use Luzrain\TelegramBotApi\Type;
use Luzrain\TelegramBotApi\TypeDenormalizable;

/**
 * This object represents a service message about a video chat started in the chat. Currently holds no information.
 */
final readonly class VideoChatStarted extends Type implements TypeDenormalizable
{
    protected function __construct()
    {
    }
}
