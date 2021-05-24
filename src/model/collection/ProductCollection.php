<?php


namespace Runroom\GildedRose\model\collection;

use Exception;
use Iterator;
use Runroom\GildedRose\model\Product;

/**
 * Class ProductCollection
 * @package Runroom\GildedRose\model\collection
 */
class ProductCollection implements Iterator
{
    /** @var int  */
    private int $iterator;

    /** @var Product[]  */
    private array $products;

    /**
     * ProductCollection constructor.
     * @param Product[] $products
     */
    public function __construct(array $products = [])
    {
        $this->products = $products;
        $this->iterator = 0;
    }

    /**
     * @param int $position
     * @return Product
     * @throws Exception
     */
    public function getProduct(int $position): Product
    {
        if (isset($this->products[$position])) {
            return $this->products[$position];
        }

        throw new Exception('Invalid position');
    }

    /**
     * @return Product
     */
    public function current(): Product
    {
        return $this->products[$this->iterator];
    }

    public function next(): void
    {
        $this->iterator++;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->iterator;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->products[$this->iterator]);
    }

    public function rewind(): void
    {
        $this->iterator = 0;
    }
}
