<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type\Passport;

use Luzrain\TelegramBotApi\BaseType;

/**
 * Represents an issue with one of the files that constitute the translation of a document. The error is considered resolved when the file changes.
 */
final readonly class PassportElementErrorTranslationFile extends BaseType implements PassportElementError
{
    /**
     * Error source, must be translation_file
     */
    protected string $source;

    public function __construct(
        /**
         * Type of element of the user's Telegram Passport which has the issue, one of“passport”, “driver_license”,“identity_card”,
         * “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
         */
        public string $type,

        /**
         * Base64-encoded file hash
         */
        public string $fileHash,

        /**
         * Error message
         */
        public string $message,
    ) {
        $this->source = 'translation_file';
    }
}
