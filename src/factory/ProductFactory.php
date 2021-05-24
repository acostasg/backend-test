<?php


namespace Runroom\GildedRose\factory;

use Runroom\GildedRose\model\Product;
use Runroom\GildedRose\model\products\AgedBrigeProduct;
use Runroom\GildedRose\model\products\BackstagePassProduct;
use Runroom\GildedRose\model\products\SulfurasProduct;
use Runroom\GildedRose\model\Quality;
use Runroom\GildedRose\model\SellIn;

class ProductFactory
{
    const AGED_BRIE = 'Aged Brie';
    const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';
    const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';

    public static function build(string $name, int $days, int $quality): Product
    {
        /** TODO move to register in container for inversion of control */
        switch ($name) {
            case self::AGED_BRIE:
                $nameClass = AgedBrigeProduct::class;
                break;
            case self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT:
                $nameClass = BackstagePassProduct::class;
                break;
            case self::SULFURAS_HAND_OF_RAGNAROS:
                $nameClass = SulfurasProduct::class;
                break;
            default:
                $nameClass = Product::class;
        }
        return new $nameClass(
            $name,
            new SellIn($days),
            new Quality($quality)
        );
    }
}
