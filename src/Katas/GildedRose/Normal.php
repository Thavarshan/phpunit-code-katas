<?php

namespace Katas\GildedRose;

class Normal extends Item
{
    /**
     * {@inheritDoc}
     */
    public function tick()
    {
        $this->sellIn -= 1;
        $this->quality -= 1;

        if ($this->sellIn <= 0) {
            $this->quality -= 1;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }
}
