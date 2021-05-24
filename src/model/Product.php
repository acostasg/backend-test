<?php

namespace Runroom\GildedRose\model;

class Product extends AbstractItem
{

    public function update(): void
    {
        if ($this->isQualityMajorByMinValue()) {
            $this->qualityDecrease();
        }

        $this->sellInDecrease();

        if ($this->isSellInMinorToMinValue()) {
            if ($this->isQualityMajorByMinValue()) {
                $this->qualityDecrease();
            }
        }
    }
}
