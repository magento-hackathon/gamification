<?php
class Hackathon_Gamification_Model_Achievement_Score_Set extends Mage_Core_Model_Abstract
{
    public function gain($achievementData) {
        $session = Mage::getSingleton('core/session');
        $session->setAchievementScore($achievementData->value);
    }

}