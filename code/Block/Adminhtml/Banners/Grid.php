<?php

class Dzinehub_Banners_Block_Adminhtml_Banners_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('bannersGrid');
		$this->setDefaultDir('ASC');
		$this->setDefaultSort('banner_id');
		$this->setSaveParamatersInSession(true);
	}

	protected function _prepareCollection()
	{
		$collection=Mage::getModel('banners/manage')->getCollection();
		$this->setCollection($collection);		
		return $collection;
	}

	protected function _prepareColumns()
	{

        $this->addColumn('banner_id', array(
            'header'    => Mage::helper('banners')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'banner_id'
        ));
 
        $this->addColumn('name', array(
            'header'    => Mage::helper('banners')->__('Name'),
            'align'     =>'left',
            'index'     => 'name'
        ));
       
        $this->addColumn('status', array(
            'header'    => Mage::helper('banners')->__('Status'),
            'align'     =>'left',
            'index'     => 'status',
            'type'      => 'options',
          	'options'   => array(
              0 => Mage::helper('banners')->__('Disabled'),
              1 => Mage::helper('banners')->__('Enabled'),
            ),
        ));
        return parent::_prepareColumns();
	}

	public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}