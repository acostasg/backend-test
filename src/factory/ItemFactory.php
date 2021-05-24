<?php


namespace Runroom\GildedRose\factory;

use Runroom\GildedRose\model\Item;
use Runroom\GildedRose\model\Quality;

class ItemFactory
{
    /**
     * @param string $name
     * @param int $sellIn
     * @param int $quality
     * @return Item
     */
    public static function build(string $name, int $sellIn, int $quality): Item
    {
        return new Item(
            $name,
            $sellIn,
            new Quality($quality)
        );
    }
}
