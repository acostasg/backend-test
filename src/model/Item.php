<?php

namespace Runroom\GildedRose\model;

class Item
{

    /** @var string */
    private string $name;
    /** @var SellIn  */
    private SellIn $sellIn;
    /** @var Quality  */
    private Quality $quality;

    /**
     * Item constructor.
     * @param string $name
     * @param SellIn $sellIn
     * @param Quality $quality
     */
    public function __construct(string $name, SellIn $sellIn, Quality $quality)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
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
     * @return int
     */
    public function getSellIn(): int
    {
        return $this->sellIn->toInt();
    }

    /**
     * @return int
     */
    public function getQuality(): int
    {
        return $this->quality->toInt();
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function sellInDecrease(): void
    {
        $this->sellIn->decrease();
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
     * @return bool
     */
    public function isSellInMinorToMaxValue(): bool
    {
        return $this->sellIn->isMinorToMaxValue();
    }

    /**
     * @return bool
     */
    public function isSellInMinorToMiddleValue(): bool
    {
        return $this->sellIn->isMinorToMiddleValue();
    }

    /**
     * @return bool
     */
    public function isSellInMinorToMinValue(): bool
    {
        return $this->sellIn->isMinorToMinValue();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->name}, {$this->sellIn->toInt()}, {$this->quality->toInt()}";
    }
}
