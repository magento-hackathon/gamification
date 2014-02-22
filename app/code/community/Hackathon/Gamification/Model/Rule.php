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
        $validatorAlias = (string)Mage::getConfig()->getNode('global/hackathon_gamification_events/' . $this->getEventName())->validator;
        if ($validatorAlias) {
            $validator = Mage::getModel($validatorAlias);
            return $validator->validate();
        }
        return true;
    }

    /*
     * @return Hackathon_Gamification_Model_Achievement
     */
    public function getAchievement() {
        return Mage::getModel($this->getAchievementModel());
    }
}
