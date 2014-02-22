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

    public function validate() {
        // TODO validate the information in the condition column
        return true;
    }

    /*
     * @return Hackathon_Gamification_Model_Achievement
     */
    public function getAchievement() {
        return Mage::getModel($this->getAchievementModel());
    }
}
