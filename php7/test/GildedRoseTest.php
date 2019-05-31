<?php

namespace App;
//use PHPUnit\Framework\TestCase;

class GildedRoseTest extends \PHPUnit\Framework\TestCase {
	

 	public function test_aged_brie_type_before_sell_in_date_updates_normally()
    {
    	$items = [new Item('Aged Brie', 10, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 9);
        $this->assertEquals($items[0]->quality, 11);
    }
    public function test_aged_brie_type_on_sell_in_date_updates_normally()
    {
    	$items = [new Item('Aged Brie', 0, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -1);
        $this->assertEquals($items[0]->quality, 12);
    }
    public function test_aged_brie_type_after_sell_in_date_updates_normally()
    {
    	$items = [new Item('Aged Brie', -5, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -6);
        $this->assertEquals($items[0]->quality, 12);
    }
    public function test_aged_brie_type_before_sell_in_date_with_maximum_quality()
    {
		$items = [new Item('Aged Brie', 5, 50)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 4);
        $this->assertEquals($items[0]->quality, 50);
    }
    public function test_aged_brie_type_on_sell_in_date_near_maximum_quality()
    {
        $items = [new Item('Aged Brie', 0, 49)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -1);
        $this->assertEquals($items[0]->quality, 50);
    }
    public function test_aged_brie_type_on_sell_in_date_with_maximum_quality()
    {
        $items = [new Item('Aged Brie', 0, 50)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -1);
        $this->assertEquals($items[0]->quality, 50);
    }
    public function test_aged_brie_type_after_sell_in_date_with_maximum_quality()
    {
        $items = [new Item('Aged Brie', -10, 50)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -11);
        $this->assertEquals($items[0]->quality, 50);
    }
    public function test_backstage_pass_before_sell_on_date_updates_normally()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 9);
        $this->assertEquals($items[0]->quality, 12);
    }
    public function test_backstage_pass_more_than_ten_days_before_sell_on_date_updates_normally()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 11, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 10);
        $this->assertEquals($items[0]->quality, 11);
    }
    public function test_backstage_pass_updates_by_three_with_five_days_left_to_sell()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 4);
        $this->assertEquals($items[0]->quality, 13);
    }
    public function test_backstage_pass_drops_to_zero_after_sell_in_date()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -1);
        $this->assertEquals($items[0]->quality, 0);
    }
    public function test_backstage_pass_close_to_sell_in_date_with_max_quality()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 50)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 9);
        $this->assertEquals($items[0]->quality, 50);
    }
    public function test_backstage_pass_very_close_to_sell_in_date_with_max_quality()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 50)];
        $item = new  GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 4);
        $this->assertEquals($items[0]->quality, 50);
    }
    public function test_backstage_pass_quality_zero_after_sell_date()
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', -5, 50)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -6);
        $this->assertEquals($items[0]->quality, 0);
    }
    public function test_sulfuras_before_sell_in_date()
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 10, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 10);
        $this->assertEquals($items[0]->quality, 80);
    }
    public function test_sulfuras_on_sell_in_date()
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 0);
        $this->assertEquals($items[0]->quality, 80);
    }
    public function test_sulfuras_after_sell_in_date()
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', -1, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -1);
        $this->assertEquals($items[0]->quality, 80);
    }
    public function test_elixir_before_sell_in_date_updates_normally()
    {
        $items = [new Item('Elixir of the Mongoose', 10, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 9);
        $this->assertEquals($items[0]->quality, 9);
    }
    public function test_dexterity_vest_before_sell_in_date_updates_normally()
    {
        $items = [new Item('+5 Dexterity Vest', 10, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, 9);
        $this->assertEquals($items[0]->quality, 9);
    }
    public function test_dexterity_vest_on_sell_in_date_quality_degrades_twice_as_fast()
    {
        $items = [new Item('+5 Dexterity Vest', 0, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -1);
        $this->assertEquals($items[0]->quality, 8);
    }
    
    public function test_dexterity_vest_after_sell_in_date_quality_degrades_twice_as_fast()
    {
        $items = [new Item('+5 Dexterity Vest', -1, 10)];
        $item = new GildedRose($items);
        $item->updateQuality();
        $this->assertEquals($items[0]->sell_in, -2);
        $this->assertEquals($items[0]->quality, 8);
    }
}
