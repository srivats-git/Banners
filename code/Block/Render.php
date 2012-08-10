<?php

class Dzinehub_Banners_Block_Render extends Mage_Core_Block_Template
{

	public $js;

	public function getAllImages()
	{
		$collection=Mage::getModel('banners/manage')->getCollection()->addFieldToFilter('status',1);
		return $collection;
	}

	public function startJs()
	{

		$effect=Mage::getStoreConfig('banners/bannerconfig/banner_effect');
		$display_time=Mage::getStoreConfig('banners/bannerconfig/display_time');
		$transition_speed=Mage::getStoreConfig('banners/bannerconfig/transition_speed');
		$controlNav=Mage::getStoreConfig('banners/bannerconfig/control_nav');
		$keyboardNav=Mage::getStoreConfig('banners/bannerconfig/keyboard_nav');
		$directionNav=Mage::getStoreConfig('banners/bannerconfig/prev_next');
		$pauseonHover=Mage::getStoreConfig('banners/bannerconfig/pauseonhover');
		$manualAdvance=Mage::getStoreConfig('banners/bannerconfig/manual_advance');
		Mage::log($manualAdvance);
		echo $this->noConflict();
		$this->js = "x(window).load(function(){";
		$this->js.= "x('#nivo-slider').nivoSlider({";
		$this->js.="'effect':'{$effect}',";
		$this->js.="'keyboardNav':{$keyboardNav},";
		$this->js.="'directionNav':{$directionNav},";
		$this->js.="'controlNav':{$controlNav},";
		$this->js.="'manualAdvance':{$manualAdvance},";
		$this->js.="'pauseTime':{$display_time},";
		$this->js.="'animSpeed':{$transition_speed},";
		$this->js.="'pauseOnHover':'{$pauseonHover}'";
		$this->js.="});";
		$this->js.="});";
		return $this->js;
	}


	public function noConflict()
	{
		return "var x=jQuery.noConflict();";
	}
}