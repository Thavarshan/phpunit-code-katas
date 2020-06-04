<?php

namespace Katas\GildedRose;

abstract class Item
{
    /**
     * Current quality of the item.
     *
     * @var int
     */
    public int $quality;

    /**
     * Sell by date/expiry date of the item.
     *
     * @var int
     */
    public int $sellIn;

    /**
     * Create new item instance.
     *
     * @param int $quality
     * @param int $sellIn
     */
    public function __construct(int $quality, int $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     * Update item quality and sell by date.
     *
     * @return void
     */
    abstract public function tick();
}
