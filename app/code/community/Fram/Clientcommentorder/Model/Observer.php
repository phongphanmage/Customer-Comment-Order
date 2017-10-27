<?php
class Fram_Clientcommentorder_Model_Observer
{
    public function checkoutTypeOnepageSaveOrder($observer)
    {
        if(!Mage::helper('clientcommentorder')->_isModuleEnable())
        {
            return;
        }else{
            $commentTotal = NULL;
            $orderComment = Mage::app()->getRequest()->getPost('ordercomment');
            if (is_array($orderComment) && isset($orderComment['comment'])) {
                $commentTotal = trim($orderComment['comment']);
                $commentTotal = nl2br(Mage::helper('clientcommentorder')->stripTags($commentTotal));

            }
            $comment = Mage::getSingleton('core/session')->getClientCommentOrder();
            if($commentTotal != NULL)
            {
                $comment = $comment.' '.$commentTotal;
            }
            if (!empty($comment)) {
                $order = $observer->getEvent()->getOrder();
                $order->addStatusToHistory($order->getStatus(),$comment,false);
                $order->save();
                return;
            }

        }
    }

    public function hookSaveBillingCheckout($observer)
    {
        if(!Mage::helper('clientcommentorder')->_isModuleEnable())
        {
            return;
        }else{
            $orderComment = Mage::app()->getRequest()->getPost('ordercomment');

            if (is_array($orderComment) && isset($orderComment['comment'])) {
                $comment = trim($orderComment['comment']);
                $comment = nl2br(Mage::helper('clientcommentorder')->stripTags($comment));
                if (!empty($comment)) {
                    Mage::getSingleton('core/session')->setClientCommentOrder($comment);
                }
            }
        }
    }
}