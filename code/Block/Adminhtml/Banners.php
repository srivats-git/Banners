<?php

class Dzinehub_Banners_Block_Adminhtml_Banners extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller='adminhtml_banners';
		$this->_blockGroup='banners';
		$this->_headerText=Mage::helper('banners')->__('Banner Manager');
		$this->_addButtonLabel="Add Banner";
		parent::__construct();
	}
}

