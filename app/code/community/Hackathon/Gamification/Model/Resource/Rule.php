<?php

class Hackathon_Gamification_Model_Resource_Rule extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Constructor
     */
    public function _construct()
    {
        $this->_init('hackathon_gamification/rule', 'id');
    }
}
