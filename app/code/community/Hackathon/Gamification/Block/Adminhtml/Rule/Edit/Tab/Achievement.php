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

        if (!$sAchievementModel = $this->getRequest()->getParam('achievement_model', false)) {
            if (Mage::registry('gamification_rule_data')) {
                $sAchievementModel = Mage::registry('gamification_rule_data')->getData('achievement_model');
            } else {
                $aAchievementModelsForForm = Mage::helper('hackathon_gamification/rule')->getAchievementModelsForForm($sEventName);
                $sAchievementModel = $aAchievementModelsForForm[0]['value'];
            }
        }
        $oForm = new Varien_Data_Form();

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
                'values'   => Mage::helper('hackathon_gamification/rule')->getAchievementModelsForForm($sEventName),
                'onchange' => "
                    new Ajax.Updater(
                        'rule_tabs_achievement_content',
                        '{$this->getUrl('*/*/loadAchievementData', array('id' => $this->getRequest()->getParam('id', false)))}',
                        {parameters:$('edit_form').serialize()}
                    )
                ",
                'value' => $sAchievementModel
            )
        );

        $oForm = Mage::helper('hackathon_gamification/rule')->getAchievementForm($oForm, $sAchievementModel);
        $this->setForm($oForm);

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
            $aValues['achievement_model'] = $sAchievementModel;
            foreach (json_decode($oModel->getData('achievement_data'), true) as $sKey => $sValue) {
                $aValues['achievement_data['.$sKey.']'] = $sValue;
            }
            $oForm->setValues($aValues);

        }
        $this->setForm($oForm);
        return parent::_prepareForm();
    }
}
