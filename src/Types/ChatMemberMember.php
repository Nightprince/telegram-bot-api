<?php

namespace TelegramBot\Api\Types;

/**
 * Represents a chat member that has no additional privileges or restrictions.
 */
class ChatMemberMember extends ChatMember
{
    protected static array $requiredParams = [
        'status',
        'user',
    ];

    protected static array $map = [
        'status' => true,
        'user' => User::class,
    ];

    /**
     * The member's status in the chat, always “member”
     */
    protected string $status;

    /**
     * Information about the user
     */
    protected User $user;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
