<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type;

use Luzrain\TelegramBotApi\Type;
use Luzrain\TelegramBotApi\TypeDenormalizable;

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 */
final readonly class UsersShared extends Type implements TypeDenormalizable
{
    protected function __construct(
        /**
         * Identifier of the request
         */
        public int $requestId,

        /**
         * Identifiers of the shared users. These numbers may have more than 32 significant bits and some programming languages may have
         * difficulty/silent defects in interpreting them. But they have at most 52 significant bits, so 64-bit integers or
         * double-precision float types are safe for storing these identifiers. The bot may not have access to the users and could be
         * unable to use these identifiers, unless the users are already known to the bot by some other means.
         *
         * @var list<int>
         */
        public array $userIds,
    ) {
    }
}