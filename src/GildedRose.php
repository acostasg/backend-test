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
        $this->items = $items;
    }

    public function update_quality(): void
    {
        foreach ($this->items as $item) {
            if ($item->getName() != TypeItem::AGED_BRIE and $item->getName() != TypeItem::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                if ($item->getQuality() > Item::MIN_QUALITY) {
                    if ($item->getName() != TypeItem::SULFURAS_HAND_OF_RAGNAROS) {
                        $item->setQuality($item->getQuality() - 1);
                    }
                }
            } else {
                if ($item->getQuality() < Item::MAX_QUALITY) {
                    $item->setQuality($item->getQuality() + 1);
                    if ($item->getName() == TypeItem::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                        if ($item->getSellIn() < Item::MAX_SELL_IN) {
                            if ($item->getQuality() < Item::MAX_QUALITY) {
                                $item->setQuality($item->getQuality() + 1);
                            }
                        }
                        if ($item->getSellIn() < Item::MIDDLE_SELL_IN) {
                            if ($item->getQuality() < Item::MAX_QUALITY) {
                                $item->setQuality($item->getQuality() + 1);
                            }
                        }
                    }
                }
            }

            if ($item->getName() != TypeItem::SULFURAS_HAND_OF_RAGNAROS) {
                $item->setSellIn($item->getSellIn() - 1);
            }

            if ($item->getSellIn() < Item::MIN_QUALITY) {
                if ($item->getName() != TypeItem::AGED_BRIE) {
                    if ($item->getName() != TypeItem::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                        if ($item->getQuality() > Item::MIN_QUALITY) {
                            if ($item->getName() != TypeItem::SULFURAS_HAND_OF_RAGNAROS) {
                                $item->setQuality($item->getQuality() - 1);
                            }
                        }
                    } else {
                        $item->setQuality(Item::MIN_QUALITY);
                    }
                } else {
                    if ($item->getQuality() < Item::MAX_QUALITY) {
                        $item->setQuality($item->getQuality() + 1);
                    }
                }
            }
        }
    }
}
