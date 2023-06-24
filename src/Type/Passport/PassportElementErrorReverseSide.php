<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type\Passport;

/**
 * Represents an issue with the reverse side of a document. The error is considered resolved when the file with reverse side of the document changes.
 */
final class PassportElementErrorReverseSide extends PassportElementError
{
    protected static array $map = [
        'source' => true,
        'type' => true,
        'file_hash' => true,
        'message' => true,
    ];

    public static function create(
        string $type,
        string $fileHash,
        string $message,
    ): self {
        $instance = new self();
        $instance->type = $type;
        $instance->fileHash = $fileHash;
        $instance->message = $message;

        return $instance;
    }

    /**
     * Error source, must be reverse_side
     */
    protected string $source = 'reverse_side';

    /**
     * The section of the user's Telegram Passport which has the issue,
     * one of “driver_license”, “identity_card”
     */
    protected string $type;

    /**
     * Base64-encoded hash of the file with the reverse side of the document
     */
    protected string $fileHash;

    /**
     * Error message
     */
    protected string $message;

    public function getSource(): string
    {
        return $this->source;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getFileHash(): string
    {
        return $this->fileHash;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}