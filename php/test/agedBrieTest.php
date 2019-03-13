<?php

require_once (realpath(dirname(__FILE__) . '/../src/gildedRose.php'));
require_once (realpath(dirname(__FILE__) . '/../src/item.php'));

use PHPUnit\Framework\TestCase;

class AgedBrieTest extends TestCase 
{
    function testAgedBrieQuality() 
    {
        $items = array(new Item("Aged Brie", 5, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("6", $items[0]->quality);
    }

    function testAgedBrieMaxQuality() 
    {
        $items = array(new Item("Aged Brie", 5, 50));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("50", $items[0]->quality);
    }

    function testAgedBrieQualityAfterSellIn() 
    {
        $items = array(new Item("Aged Brie", -1, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("7", $items[0]->quality);
    }

    function testAgedBrieMaxQualityAfterSellIn() 
    {
        $items = array(new Item("Aged Brie", -1, 49));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("50", $items[0]->quality);
    }
}
