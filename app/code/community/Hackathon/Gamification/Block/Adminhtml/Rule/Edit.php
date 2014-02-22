<?php

class Hackathon_Gamification_Block_Adminhtml_Rule_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_rule';
        $this->_blockGroup = 'hackathon_gamification';

        if ($this->getRequest()->getParam('id', false) || $this->getRequest()->getParam('event_name', false)) {
            $this->_addButton(
                'saveandcontinue',
                array(
                    'label'   => Mage::helper('adminhtml')
                            ->__('Save And Continue Edit'),
                    'onclick' => 'saveAndContinueEdit()',
                    'class'   => 'save',
                ),
                -100
            );

            $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
        } else {
            $this->_removeButton('delete');
            $this->_removeButton('save');
        }

    }

    /**
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('gamification_rule_data')
            && Mage::registry('gamification_rule_data')
                ->getId()
        ) {
            return Mage::helper('hackathon_gamification')
                ->__("Edit Item");
        } else {
            return Mage::helper('hackathon_gamification')
                ->__('Add Item');
        }
    }
}
