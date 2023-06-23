<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Types;

use Luzrain\TelegramBotApi\BaseType;
use Luzrain\TelegramBotApi\TypeInterface;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user
 * (act as if the user has selected the bot's message and tapped 'Reply').
 * This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode.
 */
final class ForceReply extends BaseType implements TypeInterface
{
    protected static array $requiredParams = [
        'force_reply',
    ];

    protected static array $map = [
        'force_reply' => true,
        'input_field_placeholder' => true,
        'selective' => true,
    ];

    /**
     * Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
     */
    protected bool $forceReply;

    /**
     * Optional. The placeholder to be shown in the input field when the reply is active; 1-64 characters
     */
    protected ?string $inputFieldPlaceholder = null;

    /**
     * Optional. Use this parameter if you want to force reply from specific users only. Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
     */
    protected ?bool $selective = null;

    public static function create(
        ?string $inputFieldPlaceholder = null,
        ?bool $selective = null,
    ): self {
        $instance = new self();
        $instance->forceReply = true;
        $instance->inputFieldPlaceholder = $inputFieldPlaceholder;
        $instance->selective = $selective;

        return $instance;
    }

    public function isForceReply(): bool
    {
        return $this->forceReply;
    }

    public function getInputFieldPlaceholder(): ?string
    {
        return $this->inputFieldPlaceholder;
    }

    public function isSelective(): ?bool
    {
        return $this->selective;
    }
}
