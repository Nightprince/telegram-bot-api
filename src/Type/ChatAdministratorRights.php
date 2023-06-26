<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type;

use Luzrain\TelegramBotApi\BaseType;
use Luzrain\TelegramBotApi\TypeInterface;

/**
 * Represents the rights of an administrator in a chat.
 */
final readonly class ChatAdministratorRights extends BaseType implements TypeInterface
{
    public function __construct(
        /**
         * True, if the user's presence in the chat is hidden
         */
        public bool $isAnonymous,

        /**
         * True, if the administrator can access the chat event log, chat statistics, message statistics in channels, see
         * channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
         */
        public bool $canManageChat,

        /**
         * True, if the administrator can delete messages of other users
         */
        public bool $canDeleteMessages,

        /**
         * True, if the administrator can manage video chats
         */
        public bool $canManageVideoChats,

        /**
         * True, if the administrator can restrict, ban or unban chat members
         */
        public bool $canRestrictMembers,

        /**
         * True, if the administrator can add new administrators with a subset of their own privileges or demoteadministrators
         * that he has promoted, directly or indirectly (promoted by administrators that were appointed by the user)
         */
        public bool $canPromoteMembers,

        /**
         * True, if the user is allowed to change the chat title, photo and other settings
         */
        public bool $canChangeInfo,

        /**
         * True, if the user is allowed to invite new users to the chat
         */
        public bool $canInviteUsers,

        /**
         * Optional. True, if the administrator can post in the channel; channels only
         */
        public bool|null $canPostMessages = null,

        /**
         * Optional. True, if the administrator can edit messages of other users and can pin messages; channels only */
        public bool|null $canEditMessages = null,

        /**
         * Optional. True, if the user is allowed to pin messages; groups and supergroups only
         */
        public bool|null $canPinMessages = null,

        /**
         * Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
         */
        public bool|null $canManageTopics = null,
    ) {
    }
}
