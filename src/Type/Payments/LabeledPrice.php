<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type\Payments;

use Luzrain\TelegramBotApi\BaseType;
use Luzrain\TelegramBotApi\TypeInterface;

/**
 * This object represents a portion of the price for goods or services.
 */
final class LabeledPrice extends BaseType implements TypeInterface
{
    protected static array $requiredParams = [
        'label',
        'amount',
    ];

    protected static array $map = [
        'label' => true,
        'amount' => true,
    ];

    /**
     * Portion label
     */
    protected string $label;

    /**
     * Price of the product in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json,
     * it shows thenumberof digits past the decimal point for each currency (2 for the majority of currencies).
     */
    protected int $amount;

    public static function create(
        string $label,
        int $amount,
    ): self {
        $instance = new self();
        $instance->label = $label;
        $instance->amount = $amount;

        return $instance;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}