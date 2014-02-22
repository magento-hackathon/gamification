<?php
class Hackathon_Gamification_Block_Adminhtml_Rule_Event_Cart_Add extends Mage_Core_Block_Abstract
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
            'name',
            'text',
            array(
                'label'    => Mage::helper('hackathon_gamification')->__('Name'),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'name',
            )
        );

        $oFieldset->addField(
            'wheel',
            'text',
            array(
                'label'    => Mage::helper('hackathon_gamification')->__('Wheels configuration'),
                'name'     => 'wheel',
            )
        );

        $oFieldset->addField(
            'mesh',
            'text',
            array(
                'label'    => Mage::helper('hackathon_gamification')->__('Meshes configuration'),
                'name'     => 'mesh',
            )
        );
        return $oForm;
    }
}
