<?php

require_once (realpath(dirname(__FILE__) . '/../src/gildedRose.php'));
require_once (realpath(dirname(__FILE__) . '/../src/item.php'));

use PHPUnit\Framework\TestCase;

class NormalItemTest extends TestCase 
{
    
    function testItemName() 
    {
        $items = array(new Item("foo", 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("foo", $items[0]->name);
    }

    function testNormalItemQuality()
    {
        $items = array(new Item("Normal Item", 5, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("4", $items[0]->quality);
    }

    function testNormalItemSellIn()
    {
        $items = array(new Item("Normal Item", 5, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("4", $items[0]->sell_in);
    }

    function testNormalItemSellInNegative()
    {
        $items = array(new Item("Normal Item", 0, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("-1", $items[0]->sell_in);
    }

    function testNormalItemQualityAfterSellIn() 
    {
        $items = array(new Item("Normal Item", -1, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("3", $items[0]->quality);
    }

    function testNormalItemQualityUnder0() 
    {
        $items = array(new Item("Normal Item", 5, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("0", $items[0]->quality);
    }

    function testNormalItemQualityUnder0AfterSellIn() 
    {
        $items = array(new Item("Normal Item", -2, 1));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("0", $items[0]->quality);
    }
}
