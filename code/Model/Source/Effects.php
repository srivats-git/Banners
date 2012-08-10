<?php

class Dzinehub_Banners_Model_Source_Effects 
{
	public function toOptionArray()
	{
		return array(
			array('value'=>fade, 'label'=>'Fade'),
			array('value'=>fold,'label'=>'Fold'),			
		);		
	}
}