<?php

class Dzinehub_Banners_Block_Adminhtml_Banners_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();
		$this->_objectId='banner_id';
		$this->_controller='adminhtml_banners';
		$this->_blockGroup='banners';
		$this->_updateButton('save', 'label', Mage::helper('banners')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('banners')->__('Delete Item'));        
	}

	public function getHeaderText()
	{
		if(Mage::registry('banners_data') && Mage::registry('banners_data')->getId())
		{
            return Mage::helper('banners')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('banners_data')->getName()));
        }
        else
        {
		return Mage::helper('banners')->__('Add Item');
		}	
	}
}