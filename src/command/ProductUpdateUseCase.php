<?php


namespace Runroom\GildedRose\command;

use Runroom\GildedRose\factory\ProductFactory;

class ProductUpdateUseCase extends Command
{
    /** TODO refactor to model update responsability */
    public function execute(): void
    {
        if ($this->product->getName() != ProductFactory::AGED_BRIE and $this->product->getName() != ProductFactory::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
            if ($this->product->isQualityMajorByMinValue()) {
                if ($this->product->getName() != ProductFactory::SULFURAS_HAND_OF_RAGNAROS) {
                    $this->product->qualityDecrease();
                }
            }
        } else {
            if ($this->product->isQualityMinorByMaxValue()) {
                $this->product->qualityIncrase();
                if ($this->product->getName() == ProductFactory::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                    if ($this->product->isSellInMinortoMaxValue()) {
                        if ($this->product->isQualityMinorByMaxValue()) {
                            $this->product->qualityIncrase();
                        }
                    }
                    if ($this->product->isSellInMinorToMiddleValue()) {
                        if ($this->product->isQualityMinorByMaxValue()) {
                            $this->product->qualityIncrase();
                        }
                    }
                }
            }
        }

        if ($this->product->getName() != ProductFactory::SULFURAS_HAND_OF_RAGNAROS) {
            $this->product->sellInDecrease();
        }

        if ($this->product->isSellInMinorToMinValue()) {
            if ($this->product->getName() != ProductFactory::AGED_BRIE) {
                if ($this->product->getName() != ProductFactory::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                    if ($this->product->isQualityMajorByMinValue()) {
                        if ($this->product->getName() != ProductFactory::SULFURAS_HAND_OF_RAGNAROS) {
                            $this->product->qualityDecrease();
                        }
                    }
                } else {
                    $this->product->setQualityToMin();
                }
            } else {
                if ($this->product->isQualityMinorByMaxValue()) {
                    $this->product->qualityIncrase();
                }
            }
        }
    }
}
