<?php

class Tamedo_OrderComment_Model_Observer {

function controllerActionPredispatchAdminhtmlSalesOrderAddComment($observer)
{
    $history = Mage::app()->getRequest()->getPost('history');
    if ($history && isset($history['comment'])) {
        $history['comment'] .= $this->_getAppend();
        Mage::app()->getRequest()->setPost('history', $history);
    }
}
function controllerActionPredispatchAdminhtmlSalesOrderCreateAddComment($observer)
{
    $history = Mage::app()->getRequest()->getPost('history');
    if ($history && isset($history['comment'])) {
        $history['comment'] .= $this->_getAppend();
        Mage::app()->getRequest()->setPost('history', $history);
    }
}
function controllerActionPredispatchAdminhtmlSalesOrderCreditmemoSave($observer)
{
    $post = Mage::app()->getRequest()->getPost('creditmemo');
    if ($post && isset($post['comment_text'])) {
        $post['comment_text'] .= $this->_getAppend();
        Mage::app()->getRequest()->setPost('creditmemo', $post);
    }
}
function controllerActionPredispatchAdminhtmlSalesOrderCreditmemoAddComment($observer)
{
    $post = Mage::app()->getRequest()->getPost('comment');
    if ($post && isset($post['comment'])) {
        $post['comment'] .= $this->_getAppend();
        Mage::app()->getRequest()->setPost('comment', $post);
    }
}
protected function _getAppend()
{
    $user     = Mage::getSingleton('admin/session');
    $username = $user->getUser()->getUsername();
    return "<br/><br/> From: " . $username;
}

}