<?php

class Dzinehub_Banners_Model_Source_Pauseonhover
{
	public function toOptionArray()
	{
		return array(
			array('value'=>'true', 'label'=>'Yes'),
			array('value'=>'false', 'label'=>'No'),
			);		
	}
}