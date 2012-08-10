<?php

class Dzinehub_Banners_Model_Mysql4_Manage extends Mage_Core_Model_Mysql4_Abstract
{
	protected function _construct()
	{
		$this->_init('banners/manage','banner_id');
	}
}