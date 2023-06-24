<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type;

use Luzrain\TelegramBotApi\BaseType;
use Luzrain\TelegramBotApi\TypeInterface;

/**
 * This object defines the criteria used to request a suitable user.
 * The identifier of the selected user will be shared with the bot when the corresponding button is pressed.
 * More about requesting users »
 * @see https://core.telegram.org/bots/features#chat-and-user-selection
 */
final class KeyboardButtonRequestUser extends BaseType implements TypeInterface
{
    protected static array $requiredParams = [
        'request_id',
    ];

    protected static array $map = [
        'request_id' => true,
        'user_is_bot' => true,
        'user_is_premium' => true,
    ];

    /**
     * Signed 32-bit identifier of the request, which will be received back in the UserShared object. Must be unique within the message
     */
    protected int $requestId;

    /**
     * Optional. Pass True to request a bot, pass False to request a regular user. If not specified, no additional restrictions are applied.
     */
    protected bool|null $userIsBot = null;

    /**
     * Optional. Pass True to request a premium user, pass False to request a non-premium user.
     * If not specified, no additional restrictions are applied.
     */
    protected bool|null $userIsPremium = null;

    public static function create(
        int $requestId,
        bool|null $userIsBot = null,
        bool|null $userIsPremium = null,
    ): self {
        $instance = new self();
        $instance->requestId = $requestId;
        $instance->userIsBot = $userIsBot;
        $instance->userIsPremium = $userIsPremium;

        return $instance;
    }

    public function getRequestId(): int
    {
        return $this->requestId;
    }

    public function getUserIsBot(): bool|null
    {
        return $this->userIsBot;
    }

    public function getUserIsPremium(): bool|null
    {
        return $this->userIsPremium;
    }
}
