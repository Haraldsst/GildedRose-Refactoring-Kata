<?php

require_once (realpath(dirname(__FILE__) . '/../src/gildedRose.php'));
require_once (realpath(dirname(__FILE__) . '/../src/item.php'));

use PHPUnit\Framework\TestCase;

class SulfurasTest extends TestCase 
{
    function testSulfurasQuality() 
    {
        $items = array(new Item("Sulfuras, Hand of Ragnaros", 5, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("5", $items[0]->quality);
    }

    function testSulfurasQualityAfterSellIn() 
    {
        $items = array(new Item("Sulfuras, Hand of Ragnaros", -1, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("5", $items[0]->quality);
    }
}
