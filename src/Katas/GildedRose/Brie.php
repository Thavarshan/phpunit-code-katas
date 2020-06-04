<?php

namespace Katas\GildedRose;

class Brie extends Item
{
    /**
     * {@inheritDoc}
     */
    public function tick()
    {
        $this->sellIn -= 1;
        $this->quality += 1;

        if ($this->sellIn <= 0) {
            $this->quality += 1;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}
