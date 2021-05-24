<?php


namespace Runroom\GildedRose\command;

use Runroom\GildedRose\model\Product;

/**
 * Class Command
 *
 * @package \GildedRose
 */
abstract class Command
{

    /**
     * @var Product
     */
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    abstract public function execute(): void;
}
