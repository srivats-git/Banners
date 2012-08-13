<?php

class Dzinehub_Banners_Adminhtml_BanneradminController extends Mage_Adminhtml_Controller_Action
{
	public function _initAction()
	{
		 $this->loadLayout()->_setActiveMenu('banners/banners')
		 ->_addBreadcrumb(Mage::helper('banners')->__('Banners Manager'), Mage::helper('banners')->__('Banners Manager'));
        return $this;
	}

	public function indexAction()
	 {
        $this->_initAction();
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('banners/adminhtml_banners'));
        $this->renderLayout();
    }

    public function newAction()
    {
    	$this->_forward('edit');
    }

    public function editAction()
    {
    	$bannerId=$this->getRequest()->getParam('id');
    	$bannerModel=Mage::getModel('banners/manage')->load($bannerId);
    	if($bannerId==0 || $bannerModel->getBannerId())
    	{
    		Mage::register('banners_data',$bannerModel);
    		$this->loadLayout();
    		$this->_setActiveMenu('banners/banners');
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
    		$this->_addContent($this->getLayout()->createBlock('banners/adminhtml_banners_edit'))
    		->_addLeft($this->getLayout()->createBlock('banners/adminhtml_banners_edit_tabs'));
    		$this->renderLayout();
    	}
    }


    public function saveAction()
    {
    	if($this->getRequest()->getPost())
    	{
    		try
    		{
    			$postData=$this->getRequest()->getPost();
    			$bannerModel=Mage::getModel('banners/manage');
                $bannerModel->setBannerId($this->getRequest()->getParam('id'));
    			if(isset($_FILES['file_image']['name']) and file_exists($_FILES['file_image']['tmp_name']))
    			{
    				try
    				{
    					$uploader=new Varien_File_Uploader('file_image');
    					$uploader->setAllowRenameFiles(true);
    					$uploader->setAllowedExtensions(array('jpg','gif','png','jpeg'));
    					$uploader->setFilesDispersion(false);
    					$path=Mage::getBaseDir('media').DS;
    					$uploader->save($path,$_FILES['file_image']['name']);
    					$postData['fileimage']=$_FILES['file_image']['name'];
    				}
    				catch(Exception $e)
    				{
                        echo $e;
    				}
    			}
                $bannerModel->setName($postData['name']);
                $bannerModel->setStatus($postData['status']);
                $bannerModel->setPath($postData['fileimage']);
    			$bannerModel->save();
    			Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('banners')->__("Banner was sucessfully saved"));
    			Mage::getSingleton('adminhtml/session')->setBannerData(false);
    			$this->_redirect('*/*/');
    			return;
    		}
    		catch(Exception $e)
    		{
    			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('banners')->__("Failed to save"));
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
    		}
    	}
    	$this->_redirect('*/*/');
    }


    public function deleteAction()
    {
        if($this->getRequest()->getParam('id')>0)
        {
            try
            {
                $bannerModel=Mage::getModel('banners/manage');
                $bannerModel->setid($this->getRequest()->getParam('id'))->delete();
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('banners')->__("Banner deleted"));
                $this->_redirect('*/*/');
            }
            catch (Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }

}