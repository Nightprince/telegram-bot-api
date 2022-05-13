<?php

namespace TelegramBot\Api\Types\Inline;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

/**
 * Contains information about an inline message sent by a Web App on behalf of a user.
 */
class SentWebAppMessage extends BaseType implements TypeInterface
{
    protected static array $requiredParams = [];

    protected static array $map = [
        'inline_message_id' => true,
    ];

    /**
     * Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message.
     */
    protected ?string $inlineMessageId = null;

    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }
}