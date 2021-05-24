<?php


namespace Runroom\GildedRose\model;

class Quality
{
    const MAX_QUALITY = 50;
    const MIN_QUALITY = 0;

    /**
     * @var int
     */
    protected int $quality;

    /**
     * Quality constructor.
     * @param int $quality
     */
    public function __construct(int $quality)
    {
        $this->setQuality($quality);
    }

    /**
     * @param int $quality
     */
    private function setQuality(int $quality): void
    {
        if ($quality < 1) {
            $quality = self::MIN_QUALITY;
        }
        if ($quality > self::MAX_QUALITY) {
            $quality = self::MAX_QUALITY;
        }
        $this->quality = $quality;
    }

    /**
     * @return int
     */
    public function toInt(): int
    {
        return $this->quality;
    }

    /**
     * @param int $points
     */
    public function increase(int $points): void
    {
        $this->setQuality($this->quality + $points);
    }

    /**
     * @param int $points
     */
    public function decrease(int $points): void
    {
        $this->setQuality($this->quality - $points);
    }

    public function setToMin(): void
    {
        $this->setQuality(self::MIN_QUALITY);
    }

    /**
     * @return bool
     */
    public function isMajorByMinValue(): bool
    {
        return ($this->quality > self::MIN_QUALITY);
    }

    /**
     * @return bool
     */
    public function isMinorByMinValue(): bool
    {
        return ($this->quality < self::MIN_QUALITY);
    }

    /**
     * @return bool
     */
    public function isMinorByMaxValue(): bool
    {
        return ($this->quality < self::MAX_QUALITY);
    }
}
