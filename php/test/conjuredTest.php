<?php

require_once (realpath(dirname(__FILE__) . '/../src/gildedRose.php'));
require_once (realpath(dirname(__FILE__) . '/../src/item.php'));

use PHPUnit\Framework\TestCase;

class ConjuredTest extends TestCase 
{
    function testConjuredQuality() 
    {
        $items = array(new Item("Conjured", 5, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("3", $items[0]->quality);
    }

    function testConjuredQualityAfterSellIn() 
    {
        $items = array(new Item("Conjured", -1, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("1", $items[0]->quality);
    }

    function testConjuredQualityUnder0() 
    {
        $items = array(new Item("Conjured", 5, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("0", $items[0]->quality);
    }

    function testConjuredQualityUnder0AfterSellIn() 
    {
        $items = array(new Item("Conjured", -2, 1));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("0", $items[0]->quality);
    }
}
