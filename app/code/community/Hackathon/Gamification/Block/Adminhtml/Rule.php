<?php

class Hackathon_Gamification_Block_Adminhtml_Rule extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_rule';
        $this->_blockGroup = 'hackathon_gamification';
        $this->_headerText = Mage::helper('hackathon_gamification')
            ->__('Rule Manager');
        $this->_addButtonLabel = Mage::helper('hackathon_gamification')
            ->__('Add Rule');
        parent::__construct();
    }
}