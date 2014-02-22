<?php
class Hackathon_Gamification_Model_Achievement_Score extends Mage_Core_Model_Abstract
{
    private function getSession() {
        return Mage::getSingleton('core/session');
    }

    public function set($value) {
        $this->getSession()->setAchievementScore($value);
    }

    public function get() {
        return $this->getSession()->getAchievementScore();
    }
}