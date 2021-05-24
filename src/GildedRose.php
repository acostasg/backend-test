<?php

namespace Runroom\GildedRose;

use Runroom\GildedRose\command\ProductUpdateUseCase;
use Runroom\GildedRose\model\Product;

class GildedRose
{
    /* @var Product[] */
    private array $items;

    /**
     * GildedRose constructor.
     * @param array $items
     */
    public function __construct(array $items)
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
