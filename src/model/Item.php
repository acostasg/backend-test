<?php

namespace Runroom\GildedRose\model;

class Item {

    /** @var string  */
    private string $name;
    /** @var int  */
    private int $sellIn;
    /** @var int  */
    private int $quality;

    /**
     * Item constructor.
     * @param string $name
     * @param int $sell_in
     * @param int $quality
     */
    function __construct(string $name, int $sell_in, int $quality) {
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
        return $this->quality;
    }

    /**
     * @param int $quality
     */
    public function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }

    /**
     * @return string
     */
    public function __toString(): string {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

}
