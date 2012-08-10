<?php

class Dzinehub_Banners_Block_Adminhtml_Banners_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form=new Varien_Data_Form();
		$this->setForm($form);
		$fieldset=$form->addFieldset('banners_form', array('legend'=>Mage::helper('banners')->__('Banner Information')));

		$fieldset->addField('name', 'text',array(
			'label'     => Mage::helper('banners')->__('Name'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'name',				
		));		

		$fieldset->addField('image','image',array(
			'label' => Mage::helper('banners')->__('Image'),
			'name' => 'file_image',
			'required' => true
		));

		$fieldset->addField('link','text',array(
			'label' => Mage::helper('banners')->__('Link'),
			'name' =>  'link',						
			));

		$fieldset->addField('status','select',array(
			'label' => Mage::helper('banners')->__('Status'),
			'name' => 'status',
			'options' => array(
				1 => 'Enabled',
				0 => 'Disabled'
			),
			'required' => true
		));
		
		if(Mage::getSingleton('adminhtml/session')->getBannersData())
		{
			$form->setValues(Mage::getSingleton('adminhtml/session')->getBannersData());
		}
		elseif(Mage::registry('banners_data'))
		{
			$form->setValues(Mage::registry('banners_data')->getData());
		}
		return parent::_prepareForm();
	}
}