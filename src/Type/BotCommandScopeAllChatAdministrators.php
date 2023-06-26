<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type;

use Luzrain\TelegramBotApi\Type;

/**
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 */
final readonly class BotCommandScopeAllChatAdministrators extends Type implements BotCommandScope
{
    /**
     * Scope type, must be all_chat_administrators
     */
    public string $type;

    public function __construct()
    {
        $this->type = 'all_chat_administrators';
    }
}
