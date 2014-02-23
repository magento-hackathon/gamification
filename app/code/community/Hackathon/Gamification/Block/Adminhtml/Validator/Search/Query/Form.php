<?php
class Hackathon_Gamification_Block_Adminhtml_Validator_Search_Query_Form extends Mage_Core_Block_Abstract
{
    public function getForm()
    {
        $oForm = new Varien_Data_Form();
        $oFieldset = $oForm->addFieldset(
            'product_form',
            array(
                'legend' => Mage::helper('hackathon_gamification')->__('General')
            )
        );

        $oFieldset->addField(
            'condition[query]',
            'text',
            array(
                'label'    => Mage::helper('hackathon_gamification')->__('Searchword'),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'condition[query]',
            )
        );

        return $oForm;
    }
}
