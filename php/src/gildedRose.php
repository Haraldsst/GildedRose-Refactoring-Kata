<?php

class GildedRose 
{

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality() 
    {
        foreach ($this->items as $item) {

            if ($item->name == 'Aged Brie') {
                $this->handleAgedBrie($item);
                continue;
            } 

            if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                continue;
            }

            if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                $this->handleBackstagePass($item);
                continue;
            }

            if ($item->name == 'Conjured') {
                $this->handleQualityDecrease($item, 2);
                continue;
            }

            $this->handleQualityDecrease($item);
        }
    }

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

