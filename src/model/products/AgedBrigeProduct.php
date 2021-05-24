<?php


namespace Runroom\GildedRose\model\products;

use Runroom\GildedRose\model\Product;

class AgedBrigeProduct extends Product
{
    public function update(): void
    {
        if ($this->isQualityMinorByMaxValue()) {
            $this->qualityIncrase();
        }

        $this->sellInDecrease();

        if ($this->isSellInMinorToMinValue()) {
            if ($this->isQualityMinorByMaxValue()) {
                $this->qualityIncrase();
            }
        }
    }
}
