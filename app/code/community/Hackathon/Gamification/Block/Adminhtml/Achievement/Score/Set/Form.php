<?php
class Hackathon_Gamification_Block_Adminhtml_Achievement_Score_Set_Form extends Mage_Core_Block_Abstract
{
    public function getForm(Varien_Data_Form $oForm)
    {
        $fieldset = $oForm->addFieldset('form', array('legend'=>'Achievement Data'));

        $fieldset->addField('achievement_data[value]', 'text', array(
            'label'     => 'Score value',
            'class'     => 'required-entry validate-digits',
            'required'  => true,
            'name'      => 'achievement_data[value]',
        ));

        return $oForm;
    }
}
