<?php

namespace TelegramBot\Api\Types;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;
use TelegramBot\Api\Types\Games\CallbackGame;

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 */
class InlineKeyboardButton extends BaseType implements TypeInterface
{
    protected static array $requiredParams = [
        'text',
    ];

    protected static array $map = [
        'text' => true,
        'url' => true,
        'callback_data' => true,
        'web_app' => WebAppInfo::class,
        'login_url' => LoginUrl::class,
        'switch_inline_query' => true,
        'switch_inline_query_current_chat' => true,
        'callback_game' => CallbackGame::class,
        'pay' => true,
    ];

    /**
     * Label text on the button
     */
    protected string $text;

    /**
     * Optional. HTTP or tg:// url to be opened when the button is pressed.
     * Links tg://user?id=<user_id> can be used to mention a user by their ID without using a username, if this is allowed by their privacy settings.
     */
    protected ?string $url = null;

    /**
     * Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
     */
    protected ?string $callbackData = null;

    /**
     * Optional. Description of the Web App that will be launched when the user presses the button.
     * The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
     * Available only in private chats between a user and the bot.
     */
    protected ?WebAppInfo $webApp = null;

    /**
     * Optional. An HTTP URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
     */
    protected ?LoginUrl $loginUrl = null;

    /**
     * Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insertthe
     * bot's username and the specified inline query in the input field. Can be empty, in which case just the bot's username will be inserted.
     */
    protected ?string $switchInlineQuery = null;

    /**
     * Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current
     * chat's input field. Can be empty, in which case only the bot's username will be inserted.
     *
     * This offers a quick way for the user to open your bot in inline mode in the same chat – good for selecting something from multiple options.
     */
    protected ?string $switchInlineQueryCurrentChat = null;

    /**
     * Optional. Description of the game that will be launched when the user presses the button.
     *
     * NOTE: This type of button must always be the first button in the first row.
     */
    protected ?CallbackGame $callbackGame = null;

    /**
     * Optional. Specify True, to send a Pay button.
     *
     * NOTE: This type of button must always be the first button in the first row and can only be used in invoice messages.
     */
    protected ?bool $pay = null;

    public static function create(
        string $text,
        ?string $url = null,
        ?string $callbackData = null,
        ?WebAppInfo $webApp = null,
        ?LoginUrl $loginUrl = null,
        ?string $switchInlineQuery = null,
        ?string $switchInlineQueryCurrentChat = null,
        ?CallbackGame $callbackGame = null,
        ?bool $pay = null,
    ) {
        $instance = new self();
        $instance->text = $text;
        $instance->url = $url;
        $instance->callbackData = $callbackData;
        $instance->webApp = $webApp;
        $instance->loginUrl = $loginUrl;
        $instance->switchInlineQuery = $switchInlineQuery;
        $instance->switchInlineQueryCurrentChat = $switchInlineQueryCurrentChat;
        $instance->callbackGame = $callbackGame;
        $instance->pay = $pay;

        return $instance;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getCallbackData(): ?string
    {
        return $this->callbackData;
    }

    public function getWebApp(): ?WebAppInfo
    {
        return $this->webApp;
    }

    public function getLoginUrl(): ?LoginUrl
    {
        return $this->loginUrl;
    }

    public function getSwitchInlineQuery(): ?string
    {
        return $this->switchInlineQuery;
    }

    public function getSwitchInlineQueryCurrentChat(): ?string
    {
        return $this->switchInlineQueryCurrentChat;
    }

    public function getCallbackGame(): ?CallbackGame
    {
        return $this->callbackGame;
    }

    public function isPay(): ?bool
    {
        return $this->pay;
    }
}