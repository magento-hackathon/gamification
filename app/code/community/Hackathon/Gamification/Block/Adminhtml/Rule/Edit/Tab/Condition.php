<?php

class Hackathon_Gamification_Block_Adminhtml_Rule_Edit_Tab_Condition extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $sEventName = $this->getRequest()->getParam('event_name', false);
        if (!$sEventName) {
            $sEventName = Mage::registry('gamification_rule_data')->getData('event_name');
        }

        $oForm = Mage::helper('hackathon_gamification/rule')->getEventForm($sEventName);

        if (Mage::getSingleton('adminhtml/session')->getFormData()) {
            $oForm->setValues(
                Mage::getSingleton('adminhtml/session')
                    ->getFormData()
            );
            Mage::getSingleton('adminhtml/session')
                ->getFormData(null);
        } elseif (Mage::registry('gamification_rule_data')) {
            $oModel = Mage::registry('gamification_rule_data');
            $aValues = json_decode($oModel->getData('condition'), true);
            $aValues['event_name'] = $oModel->getData('event_name');
            $oForm->setValues($aValues);

        }
        $this->setForm($oForm);
        return parent::_prepareForm();
    }
}
