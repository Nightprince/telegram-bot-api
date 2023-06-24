<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type;

use Luzrain\TelegramBotApi\BaseType;
use Luzrain\TelegramBotApi\TypeInterface;

/**
 * This object represents one button of the reply keyboard.
 * For simple text buttons, String can be used instead of this object to specify the button text.
 * The optional fields web_app, request_user, request_chat, request_contact, request_location, and request_poll are mutually exclusive.
 */
final class KeyboardButton extends BaseType implements TypeInterface
{
    protected static array $requiredParams = [
        'text',
    ];

    protected static array $map = [
        'text' => true,
        'request_user' => KeyboardButtonRequestUser::class,
        'request_chat' => KeyboardButtonRequestChat::class,
        'request_contact' => true,
        'request_location' => true,
        'request_poll' => KeyboardButtonPollType::class,
        'web_app' => WebAppInfo::class,
    ];

    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
     */
    protected string $text;

    /**
     * Optional. If specified, pressing the button will open a list of suitable users.
     * Tapping on any user will send their identifier to the bot in a “user_shared” service message.
     * Available in private chats only.
     */
    protected KeyboardButtonRequestUser|null $requestUser = null;

    /**
     * Optional. If specified, pressing the button will open a list of suitable chats.
     * Tapping on a chat will send its identifier to the bot in a “chat_shared” service message.
     * Available in private chats only.
     */
    protected KeyboardButtonRequestChat|null $requestChat = null;

    /**
     * Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
     * Available in private chats only.
     */
    protected bool|null $requestContact = null;

    /**
     * Optional. If True, the user's current location will be sent when the button is pressed.
     * Available in private chats only.
     */
    protected bool|null $requestLocation = null;

    /**
     * Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed.
     * Available in private chats only.
     */
    protected KeyboardButtonPollType|null $requestPoll = null;

    /**
     * Optional. If specified, the described Web App will be launched when the button is pressed.
     * The Web App will be able to send a “web_app_data” service message.
     * Available in private chats only.
     */
    protected WebAppInfo|null $webApp = null;

    /**
     * Create new instance of KeyboardButton
     */
    public static function create(
        string $text,
        KeyboardButtonRequestUser|null $requestUser = null,
        KeyboardButtonRequestChat|null $requestChat = null,
        bool|null $requestContact = null,
        bool|null $requestLocation = null,
        KeyboardButtonPollType|null $requestPoll = null,
        WebAppInfo|null $webApp = null,
    ) {
        $instance = new self();
        $instance->text = $text;
        $instance->requestUser = $requestUser;
        $instance->requestChat = $requestChat;
        $instance->requestContact = $requestContact;
        $instance->requestLocation = $requestLocation;
        $instance->requestPoll = $requestPoll;
        $instance->webApp = $webApp;

        return $instance;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getRequestUser(): KeyboardButtonRequestUser|null
    {
        return $this->requestUser;
    }

    public function getRequestChat(): KeyboardButtonRequestChat|null
    {
        return $this->requestChat;
    }

    public function isRequestContact(): bool|null
    {
        return $this->requestContact;
    }

    public function isRequestLocation(): bool|null
    {
        return $this->requestLocation;
    }

    public function getRequestPoll(): KeyboardButtonPollType|null
    {
        return $this->requestPoll;
    }

    public function getWebApp(): WebAppInfo|null
    {
        return $this->webApp;
    }
}
