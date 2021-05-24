<?php


namespace Runroom\GildedRose\model\products;

use Runroom\GildedRose\model\Product;

class BackstagePassProduct extends Product
{
    public function update(): void
    {
        if ($this->isQualityMinorByMaxValue()) {
            $this->qualityIncrase();
            if ($this->isSellInMinortoMaxValue()) {
                if ($this->isQualityMinorByMaxValue()) {
                    $this->qualityIncrase();
                }
            }
            if ($this->isSellInMinorToMiddleValue()) {
                if ($this->isQualityMinorByMaxValue()) {
                    $this->qualityIncrase();
                }
            }
        }


        $this->sellInDecrease();

        if ($this->isSellInMinorToMinValue()) {
            $this->setQualityToMin();
        }
    }
}
