<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Method;

use Luzrain\TelegramBotApi\BaseMethod;
use Luzrain\TelegramBotApi\Type\Arrays\ArrayOfChatMemberEntity;
use Luzrain\TelegramBotApi\Type\ChatMember;

/**
 * Use this method to get a list of administrators in a chat.
 * On success, returns an Array of ChatMember objects that contains information about all chat administrators except other bots.
 * If the chat is a group or a supergroup and no administrators were appointed, only the creator will be returned.
 *
 * @extends BaseMethod<list<ChatMember>>
 */
final class GetChatAdministrators extends BaseMethod
{
    protected static string $methodName = 'getChatAdministrators';
    protected static string $responseClass = ArrayOfChatMemberEntity::class;

    public function __construct(
        /**
         * Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
         */
        protected int|string $chatId,
    ) {
    }
}