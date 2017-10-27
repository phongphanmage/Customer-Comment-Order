<?php
/**
 * Created by PhpStorm.
 * User: w1ndy
 * Date: 26/10/2017
 * Time: 18:04
 */
class Fram_Clientcommentorder_Block_Checkout_Onepage_Billing extends Mage_Checkout_Block_Onepage_Billing
{
    protected function _toHtml()
    {
        if(Mage::helper('clientcommentorder')->_isModuleEnable())
        {
            $this->setTemplate('clientordercomment/billing.phtml');    
        }
        return parent::_toHtml();
    }
}
