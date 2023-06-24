<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type\Inline;

/**
 * Represents the content of a location message to be sent as the result of an inline query.
 */
final class InputLocationMessageContent extends InputMessageContent
{
    protected static array $map = [
        'latitude' => true,
        'longitude' => true,
        'horizontal_accuracy' => true,
        'live_period' => true,
        'heading' => true,
        'proximity_alert_radius' => true,
    ];

    /**
     * Latitude of the location in degrees
     */
    protected float $latitude;

    /**
     * Longitude of the location in degrees
     */
    protected float $longitude;

    /**
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     */
    protected float|null $horizontalAccuracy = null;

    /**
     * Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
     */
    protected int|null $livePeriod = null;

    /**
     * Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
     */
    protected int|null $heading = null;

    /**
     * Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
     */
    protected int|null $proximityAlertRadius = null;

    public static function create(
        float $latitude,
        float $longitude,
        float|null $horizontalAccuracy = null,
        int|null $livePeriod = null,
        int|null $heading = null,
        int|null $proximityAlertRadius = null,
    ): self {
        $instance = new self();
        $instance->latitude = $latitude;
        $instance->longitude = $longitude;
        $instance->horizontalAccuracy = $horizontalAccuracy;
        $instance->livePeriod = $livePeriod;
        $instance->heading = $heading;
        $instance->proximityAlertRadius = $proximityAlertRadius;

        return $instance;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getHorizontalAccuracy(): float|null
    {
        return $this->horizontalAccuracy;
    }

    public function getLivePeriod(): int|null
    {
        return $this->livePeriod;
    }

    public function getHeading(): int|null
    {
        return $this->heading;
    }

    public function getProximityAlertRadius(): int|null
    {
        return $this->proximityAlertRadius;
    }
}
