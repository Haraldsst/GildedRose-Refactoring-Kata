<?php

require_once (realpath(dirname(__FILE__) . '/../src/gildedRose.php'));
require_once (realpath(dirname(__FILE__) . '/../src/item.php'));

use PHPUnit\Framework\TestCase;

class BackstageTest extends TestCase 
{
    function testBackstageQualityStandard() 
    {
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 20, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("6", $items[0]->quality);
    }

    function testBackstageQualitUnder10() 
    {
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 10, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("7", $items[0]->quality);
    }

    function testBackstageQualityUnder5() 
    {
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 5, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("8", $items[0]->quality);
    }

    function testBackstageQualityUnder0() 
    {
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 0, 5));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("0", $items[0]->quality);
    }
    
    function testBackstageMaxQualityUnder10() 
    {
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 10, 49));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("50", $items[0]->quality);
    }

    function testBackstageMaxQualityUnder5() 
    {
        $items = array(new Item("Backstage passes to a TAFKAL80ETC concert", 5, 49));
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("50", $items[0]->quality);
    }
}
