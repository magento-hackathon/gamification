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
        $xpath = Mage::helper('hackathon_gamification/rule')->getObserverXPath($this->getEventName());
        $result = (array) Mage::getConfig()->getXpath($xpath . '/validator');
        $validatorAlias = (string) current($result);
        if ($validatorAlias) {
            Mage::log($validatorAlias);
            $validator = Mage::getModel($validatorAlias);
            return $validator->validate(json_decode($this->getCondition()));
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
