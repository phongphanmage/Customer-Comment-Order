<?php
class Fram_Clientcommentorder_Block_Checkout_Agreements extends Mage_Checkout_Block_Agreements
{
    protected function _toHtml()
    {
        $this->setTemplate('clientordercomment/comment.phtml');
        return parent::_toHtml();
    }
    public function getTitle()
    {
        return Mage::helper('clientcommentorder')->getTitle();
    }
}