<?php
class Hackathon_Gamification_Block_Achievement_Score_Set_Form extends Varien_Data_Form
{
    protected function _construct() {
        $fieldset = $this->addFieldset('form', array('legend'=>'Achievement Data'));

         $fieldset->addField('value', 'text', array(
             'label'     => 'Score value',
             'class'     => 'required-entry validate-digits',
             'required'  => true,
             'name'      => 'value',
         ));

        return parent::_construct();
    }
}