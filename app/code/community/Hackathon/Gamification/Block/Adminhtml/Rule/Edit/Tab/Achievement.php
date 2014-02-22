<?php

class Hackathon_Gamification_Block_Adminhtml_Rule_Edit_Tab_Achievement extends Mage_Adminhtml_Block_Widget_Form
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

        $oForm = new Varien_Data_Form();
        $this->setForm($oForm);

        $oFieldset = $oForm->addFieldset(
            'achievement_fieldset',
            array(
                'legend' => Mage::helper('hackathon_gamification')->__('Achievement information')
            )
        );

        $oFieldset->addField(
            'achievement_model',
            'select',
            array(
                'label'    => Mage::helper('hackathon_gamification')->__('Achievement model'),
                'name'     => 'achievement_model',
                'values'   => Mage::helper('hackathon_gamification/rule')->getAchievementModelsForForm($sEventName)
            )
        );

        if (Mage::getSingleton('adminhtml/session')->getFormData()) {
            $oForm->setValues(
                Mage::getSingleton('adminhtml/session')
                    ->getFormData()
            );
            Mage::getSingleton('adminhtml/session')
                ->getFormData(null);
        } elseif (Mage::registry('gamification_rule_data')) {
            $oModel = Mage::registry('gamification_rule_data');
            $aValues = array();
            $aValues['achievement_model'] = $oModel->getData('achievement_model');
            $oForm->setValues($aValues);
        }
        $this->setForm($oForm);
        return parent::_prepareForm();
    }
}
