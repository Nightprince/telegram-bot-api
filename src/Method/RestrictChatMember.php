<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Method;

use Luzrain\TelegramBotApi\Method;
use Luzrain\TelegramBotApi\Type\ChatPermissions;

/**
 * Use this method to restrict a user in a supergroup.
 * The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights.
 * Pass True for all permissions to lift restrictions from a user.
 * Returns True on success.
 *
 * @extends Method<true>
 */
final class RestrictChatMember extends Method
{
    protected static string $methodName = 'restrictChatMember';

    public function __construct(
        /**
         * Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         */
        protected int|string $chatId,

        /**
         * Unique identifier of the target user
         */
        protected int $userId,

        /**
         * A JSON-serialized object for new user permissions
         */
        protected ChatPermissions $permissions,

        /**
         * Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews
         * permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes,
         * and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
         */
        protected bool|null $useIndependentChatPermissions = null,

        /**
         * Date when restrictions will be lifted for the user, unix time.
         * If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever
         */
        protected bool|null $untilDate = null,
    ) {
    }
}
