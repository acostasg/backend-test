<?php


namespace Runroom\GildedRose\command;

class ProductUpdateUseCase extends Command
{
    public function execute(): void
    {
        $this->product->update();
    }
}
