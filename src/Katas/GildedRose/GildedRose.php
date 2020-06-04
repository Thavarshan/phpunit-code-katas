<?php

namespace Katas\GildedRose;

use Katas\Kata;
use InvalidArgumentException;
use Katas\Contracts\Executable;

class GildedRose extends Kata implements Executable
{
    /**
     * Items list lookup.
     *
     * @var array
     */
    protected static array $items = [
        'normal' => Normal::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfurus::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePasses::class,
        'Conjured Mana Cake' => Conjured::class,
    ];

    /**
     * {@inheritDoc}
     */
    public function execute(...$arguments)
    {
    }

    /**
     * Update item status.
     *
     * @param  string $name
     * @param  int $quality
     * @param  int $sellIn
     * @return \Katas\GildedRose\Item
     *
     * @throws \InvalidArgumentException
     */
    public static function of($name, $quality, $sellIn)
    {
        if (array_key_exists($name, self::$items)) {
            return new self::$items[$name]($quality, $sellIn);
        }

        throw new InvalidArgumentException('Item type does not exist.');
    }
}
