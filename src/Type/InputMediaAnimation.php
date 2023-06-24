<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type;

use Luzrain\TelegramBotApi\Type\Arrays\ArrayOfMessageEntity;

/**
 * Represents an animation file (GIF or H.264/MPEG-4 AVC video without sound) to be sent.
 */
final class InputMediaAnimation extends InputMedia
{
    protected static array $map = [
        'type' => true,
        'media' => true,
        'thumbnail' => true,
        'caption' => true,
        'parse_mode' => true,
        'caption_entities' => ArrayOfMessageEntity::class,
        'width' => true,
        'height' => true,
        'duration' => true,
        'has_spoiler' => true,
    ];

    /**
     * Type of the result, must be animation
     */
    protected string $type = 'animation';

    /**
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload
     * a new one using multipart/form-data under <file_attach_name> name.
     *
     * @see https://core.telegram.org/bots/api#sending-files
     */
    protected InputFile|string $media;

    /**
     * Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side.
     * The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320.
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file,
     * so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>.
     *
     * @see https://core.telegram.org/bots/api#sending-files
     */
    protected InputFile|string|null $thumbnail = null;

    /**
     * Optional. Caption of the animation to be sent, 0-1024 characters after entities parsing
     */
    protected string|null $caption = null;

    /**
     * Optional. Mode for parsing entities in the animation caption. See formatting options for more details.
     *
     * @see https://core.telegram.org/bots/api#formatting-options
     */
    protected string|null $parseMode = null;

    /**
     * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     *
     * @var MessageEntity[]
     */
    protected array|null $captionEntities = null;

    /**
     * Optional. Animation width
     */
    protected int|null $width = null;

    /**
     * Optional. Animation height
     */
    protected int|null $height = null;

    /**
     * Optional. Animation duration in seconds
     */
    protected int|null $duration = null;

    /**
     * Optional. Pass True if the animation needs to be covered with a spoiler animation
     */
    protected bool|null $hasSpoiler = null;

    public static function create(
        InputFile|string $media,
        InputFile|string|null $thumbnail = null,
        string|null $caption = null,
        string|null $parseMode = null,
        array|null $captionEntities = null,
        int|null $width = null,
        int|null $height = null,
        int|null $duration = null,
        bool|null $hasSpoiler = null,
    ): self {
        $instance = new self();
        $instance->media = $media;
        $instance->thumbnail = $thumbnail;
        $instance->caption = $caption;
        $instance->parseMode = $parseMode;
        $instance->captionEntities = $captionEntities;
        $instance->width = $width;
        $instance->height = $height;
        $instance->duration = $duration;
        $instance->hasSpoiler = $hasSpoiler;

        return $instance;
    }

    public function getThumbnail(): InputFile|string|null
    {
        return $this->thumbnail;
    }
}
