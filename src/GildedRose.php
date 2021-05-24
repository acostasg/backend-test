<?php

namespace Runroom\GildedRose;

use Runroom\GildedRose\command\ProductUpdateUseCase;
use Runroom\GildedRose\model\collection\ProductCollection;

class GildedRose
{
    /** @var ProductCollection  */
    private ProductCollection $items;

    /**
     * GildedRose constructor.
     * @param ProductCollection $items
     */
    public function __construct(ProductCollection $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            (new ProductUpdateUseCase($item))->execute();
        }
    }
}
