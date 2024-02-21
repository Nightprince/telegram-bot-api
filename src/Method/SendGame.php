<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Method;

use Luzrain\TelegramBotApi\Method;
use Luzrain\TelegramBotApi\Type\InlineKeyboardMarkup;
use Luzrain\TelegramBotApi\Type\Message;
use Luzrain\TelegramBotApi\Type\ReplyParameters;

/**
 * Use this method to send a game. On success, the sent Message is returned.
 *
 * @extends Method<Message>
 */
final class SendGame extends Method
{
    protected static string $methodName = 'sendGame';
    protected static string $responseClass = Message::class;

    public function __construct(
        /**
         * Unique identifier for the target chat
         */
        protected int $userId,

        /**
         * Short name of the game, serves as the unique identifier for the game. Set up your games via @BotFather.
         */
        protected string $gameShortName,

        /**
         * Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
         */
        protected int|null $messageThreadId = null,

        /**
         * Sends the message silently. Users will receive a notification with no sound.
         */
        protected bool|null $disableNotification = null,

        /**
         * Protects the contents of the sent message from forwarding and saving
         */
        protected bool|null $protectContent = null,

        /**
         * Description of the message to reply to
         */
        protected ReplyParameters|null $replyParameters = null,

        /**
         * A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be shown.
         * If not empty, the first button must launch the game.
         */
        protected InlineKeyboardMarkup|null $replyMarkup = null,
    ) {
    }
}
