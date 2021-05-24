<?php

namespace Runroom\GildedRose\model;

class Item {

    const MAX_SELL_IN = 11;
    const MIDDLE_SELL_IN = 6;
    const MIN_SELL_IN = 0;

    /** @var string  */
    private string $name;
    /** @var int  */
    private int $sellIn;
    /** @var Quality  */
    private Quality $quality;

    /**
     * Item constructor.
     * @param string $name
     * @param int $sell_in
     * @param Quality $quality
     */
function __construct(string $name, int $sell_in, Quality $quality) {
        $this->name = $name;
        $this->sellIn = $sell_in;
        $this->quality = $quality;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    /**
     * @param int $sellIn
     */
    public function setSellIn(int $sellIn): void
    {
        $this->sellIn = $sellIn;
    }

    /**
     * @return int
     */
    public function getQuality(): int
    {
        return $this->quality->toInt();
    }

    public function qualityIncrase(): void
    {
        $this->quality->increase(1);
    }

    public function qualityDecrease(): void
    {
        $this->quality->decrease(1);
    }


    public function setQualityToMin(): void
    {
        $this->quality->setToMin();
    }


    /**
     * @return bool
     */
    public function isQualityMajorByMinValue(): bool
    {
        return $this->quality->isMajorByMinValue();
    }

    /**
     * @return bool
     */
    public function isQualityMinorByMinValue(): bool
    {
        return $this->quality->isMinorByMinValue();
    }

    /**
     * @return bool
     */
    public function isQualityMinorByMaxValue(): bool
    {
        return $this->quality->isMinorByMaxValue();
    }

    /**
     * @return string
     */
    public function __toString(): string {
        return "{$this->name}, {$this->sellIn}, {$this->quality->toInt()}";
    }

}
