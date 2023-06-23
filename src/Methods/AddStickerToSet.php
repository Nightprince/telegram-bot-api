<?php

declare(strict_types=1);

namespace TelegramBot\Api\Methods;

use TelegramBot\Api\BaseMethod;
use TelegramBot\Api\Types\InputFile;
use TelegramBot\Api\Types\InputSticker;
use TelegramBot\Api\Types\Stickers\MaskPosition;

/**
 * Use this method to add a new sticker to a set created by the bot.
 * The format of the added sticker must match the format of the other stickers in the set.
 * Emoji sticker sets can have up to 200 stickers. Animated and video sticker sets can have up to 50 stickers.
 * Static sticker sets can have up to 120 stickers. Returns True on success.
 */
final class AddStickerToSet extends BaseMethod
{
    protected static string $methodName = 'addStickerToSet';

    public function __construct(

        /**
         * User identifier of sticker set owner
         */
        protected int $userId,

        /**
         * Sticker set name
         */
        protected string $name,

        /**
         * A JSON-serialized object with information about the added sticker.
         * If exactly the same sticker had already been added to the set, then the set isn't changed.
         */
        protected InputSticker $stickers,
    ) {
    }
}
