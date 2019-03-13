<?php

class GildedRose 
{
<<<<<<< HEAD
=======

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

>>>>>>> 8d4f6ced40fbb75042cae06ea6769afc2d363eab
    public function updateQuality() 
    {
        foreach ($this->items as $item) {

<<<<<<< HEAD
            if (startsWith($item->name, 'Aged Brie')) {
=======
            if ($item->name == 'Aged Brie') {
>>>>>>> 8d4f6ced40fbb75042cae06ea6769afc2d363eab
                $this->handleAgedBrie($item);
                continue;
            } 

<<<<<<< HEAD
            if (startsWith($item->name, 'Sulfuras')) {
                continue;
            }

            if (startsWith($item->name, 'Backstage passes')) {
=======
            if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                continue;
            }

            if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
>>>>>>> 8d4f6ced40fbb75042cae06ea6769afc2d363eab
                $this->handleBackstagePass($item);
                continue;
            }

<<<<<<< HEAD
            if (startsWith($item->name, 'Conjured')) {
=======
            if ($item->name == 'Conjured') {
>>>>>>> 8d4f6ced40fbb75042cae06ea6769afc2d363eab
                $this->handleQualityDecrease($item, 2);
                continue;
            }

            $this->handleQualityDecrease($item);
        }
    }

<<<<<<< HEAD
    private function startsWith($name, $key)
    {
         $length = strlen($key);
         return (substr($name, 0, $length) === $key);
    }

=======
>>>>>>> 8d4f6ced40fbb75042cae06ea6769afc2d363eab
    private function handleAgedBrie($item)
    {
        $item->sell_in -= 1;
        $item->quality += 1;

        if ($item->sell_in < 0) {
            $item->quality += 1;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

    private function handleBackstagePass($item) 
    {
        $item->sell_in -= 1;
        $item->quality += 1;
        
        if ($item->sell_in < 5) {
            $item->quality += 1;
        }

        if ($item->sell_in < 10) {
            $item->quality += 1;
        }

        if ($item->sell_in < 0) {
            $item->quality = 0;
        }

        if ($item->quality > 50) {
            $item->quality = 50;
        }
    }

    private function handleQualityDecrease($item, $value = 1) 
    {
        $item->sell_in -= 1;
        $item->quality -= $value;

        if ($item->sell_in < 0) {
            $item->quality -= $value;
        }
        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}

