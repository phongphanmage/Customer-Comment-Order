<?php
class Fram_Clientcommentorder_Helper_Data extends Mage_Core_Helper_Abstract
{

    protected $storeId;
    public function __construct()
    {
        $this->storeId = Mage::app()->getStore()->getId();
    }

    public function _isModuleEnable()
    {
        return Mage::getStoreConfig('fram_clientordercomment/config/enable',$this->storeId);
    }

    public function getTitle()
    {
        return Mage::getStoreConfig('fram_clientordercomment/config/title',$this->storeId);
    }

    public function _showInBillingField()
    {
        return Mage::getStoreConfig('fram_clientordercomment/config/enable_billing',$this->storeId);
    }
    
}