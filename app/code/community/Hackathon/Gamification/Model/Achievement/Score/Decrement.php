<?php
class Hackathon_Gamification_Model_Achievement_Score_Decrement extends Mage_Core_Model_Abstract
{
    public function gain() {
        $session = Mage::getSingleton('core/session');
        $session->setAchievementScore(
            max(
                0, // don't go into negative area
                $session->getAchievementScore() - 1
            )
        );
    }

}