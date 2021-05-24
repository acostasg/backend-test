<?php

namespace Runroom\GildedRose;

use Runroom\GildedRose\model\Item;
use Runroom\GildedRose\model\TypeItem;

class GildedRose
{
    /* @var item[] */
    private array $items;

    /**
     * GildedRose constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;hh
    }

    public function update_quality(): void
    {
        foreach ($this->items as $item) {
            if ($item->getName() != TypeItem::AGED_BRIE and $item->getName() != TypeItem::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                if ($item->isQualityMajorByMinValue()) {
                    if ($item->getName() != TypeItem::SULFURAS_HAND_OF_RAGNAROS) {
                        $item->qualityDecrease();
                    }
                }
            } else {
                if ($item->isQualityMinorByMaxValue()) {
                    $item->qualityIncrase();
                    if ($item->getName() == TypeItem::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                        if ($item->isSellInMinortoMaxValue()) {
                            if ($item->isQualityMinorByMaxValue()) {
                                $item->qualityIncrase();
                            }
                        }
                        if ($item->isSellInMinorToMiddleValue()) {
                            if ($item->isQualityMinorByMaxValue()) {
                                $item->qualityIncrase();
                            }
                        }
                    }
                }
            }

            if ($item->getName() != TypeItem::SULFURAS_HAND_OF_RAGNAROS) {
                $item->sellInDecrease();
            }

            if ($item->isSellInMinorToMinValue()) {
                if ($item->getName() != TypeItem::AGED_BRIE) {
                    if ($item->getName() != TypeItem::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                        if ($item->isQualityMajorByMinValue()) {
                            if ($item->getName() != TypeItem::SULFURAS_HAND_OF_RAGNAROS) {
                                $item->qualityDecrease();
                            }
                        }
                    } else {
                        $item->setQualityToMin();
                    }
                } else {
                    if ($item->isQualityMinorByMaxValue()) {
                        $item->qualityIncrase();
                    }
                }
            }
        }
    }
}
