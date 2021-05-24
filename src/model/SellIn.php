<?php


namespace Runroom\GildedRose\model;

class SellIn
{
    const MAX_SELL_IN = 11;
    const MIDDLE_SELL_IN = 6;
    const MIN_SELL_IN = 0;

    private int $days;

    /**
     * SellIn constructor.
     * @param int $days
     */
    public function __construct(int $days)
    {
        $this->days = $days;
    }

    /**
     * @return int
     */
    public function toInt(): int
    {
        return $this->days;
    }

    public function decrease(): void
    {
        $this->days--;
    }

    /**
     * @return bool
     */
    public function isMinorToMaxValue(): bool
    {
        return ($this->days < self::MAX_SELL_IN);
    }

    /**
     * @return bool
     */
    public function isMinorToMiddleValue(): bool
    {
        return ($this->days < self::MIDDLE_SELL_IN);
    }

    /**
     * @return bool
     */
    public function isMinorToMinValue(): bool
    {
        return ($this->days < self::MIN_SELL_IN);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->toInt();
    }
}
