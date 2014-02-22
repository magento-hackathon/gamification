<?php

class Hackathon_Gamification_Adminhtml_Gamification_RuleController extends Mage_Adminhtml_Controller_Action
{
    /**
     * @return $this
     */
    protected function _initAction()
    {
        $this
            ->loadLayout()
            ->_setActiveMenu('promo/hackathon_gamification/manage_rules');

        return $this;
    }

    public function indexAction()
    {
        $this
            ->_initAction()
            ->renderLayout();
    }

    public function saveAction()
    {
        $sStoreId = $this
            ->getRequest()
            ->getParam('store', Mage_Core_Model_App::ADMIN_STORE_ID);

        if ($aPostData = $this->getRequest()->getPost()) {
            $oModel = Mage::getModel('hackathon_gamification/rule');
            $aData = array();
            $aData['event_name'] = $aPostData['event_name'];
            $aData['achievement_model'] = $aPostData['achievement_model'];
            unset($aPostData['event_name']);
            unset($aPostData['achievement_model']);
            unset($aPostData['form_key']);
            $aData['condition'] = json_encode($aPostData);
            $oModel->setData($aData)
                ->setId(
                    $this
                        ->getRequest()
                        ->getParam('id')
                )
                ->setStore($sStoreId)
            ;

            try {
                $oModel->save();
                Mage::getSingleton('adminhtml/session')
                    ->addSuccess(
                        Mage::helper('hackathon_gamification')->__('Item was successfully saved')
                    );
                Mage::getSingleton('adminhtml/session')
                    ->setFormData(false);

                if ($this
                    ->getRequest()
                    ->getParam('back')
                ) {
                    $this->_redirect(
                        '*/*/edit',
                        array(
                            'id' => $oModel->getId(),
                            'store' => $sStoreId
                        )
                    );
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (Exception $oException) {
                Mage::getSingleton('adminhtml/session')
                    ->addError($oException->getMessage());
                Mage::getSingleton('adminhtml/session')
                    ->setFormData($this->getRequest()->getPost());
                $this->_redirect(
                    '*/*/edit',
                    array(
                        'id' => $this
                                ->getRequest()
                                ->getParam('id'),
                        'store' => $sStoreId
                    )
                );
                return;
            }
        }
    }

    public function editAction()
    {
        $this->_initAction();
        $iId = $this
            ->getRequest()
            ->getParam('id');
        $oModel = Mage::getModel('hackathon_gamification/rule')
            ->load($iId);

        if ($oModel->getId() || $iId == 0) {
            $aData = Mage::getSingleton('adminhtml/session')
                ->getFormData(true);
            if (!empty($aData)) {
                $oModel->setData($aData);
            }

            Mage::register('gamification_rule_data', $oModel);

            $this
                ->getLayout()
                ->getBlock('head')
                ->setCanLoadExtJs(true);


            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')
                ->addError(
                    Mage::helper('hackathon_gamification')->__('Item does not exist')
                );
            $this->_redirect('*/*/');
        }
    }

    public function deleteAction()
    {
        if ($this
                ->getRequest()
                ->getParam('id') > 0
        ) {
            try {
                $oModel = Mage::getModel('hackathon_gamification/rule');

                $oModel
                    ->setId(
                        $this
                            ->getRequest()
                            ->getParam('id')
                    )
                    ->delete();

                Mage::getSingleton('adminhtml/session')
                    ->addSuccess(
                        Mage::helper('adminhtml')->__('Item was successfully deleted')
                    );
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')
                    ->addError($e->getMessage());
                $this->_redirect(
                    '*/*/edit',
                    array(
                        'id' => $this
                                ->getRequest()
                                ->getParam('id')
                    )
                );
            }
        }
        $this->_redirect('*/*/');
    }

    public function newAction()
    {
        $this
            ->_initAction()
            ->renderLayout();
    }
}
