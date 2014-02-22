<?php

class Hackathon_Gamification_Model_Rule extends Mage_Core_Model_Abstract
{
    /**
     * Constructor
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('hackathon_gamification/rule');
    }

    public function isConditionTrue() {
        // TODO validate the information in the condition column
        return true;
    }
}
