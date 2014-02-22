<?php
class Hackathon_Gamification_Model_Achievement_Score_Increment extends Mage_Core_Model_Abstract
{
    public function gain() {
        $session = Mage::getSingleton('core/session');
        $session->setAchievementScore($session->getAchievementScore() + 1);
    }

}