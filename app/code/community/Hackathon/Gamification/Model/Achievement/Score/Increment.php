<?php
class Hackathon_Gamification_Model_Achievement_Score_Increment extends Mage_Core_Model_Abstract
{
    public function gain() {
        $score = Mage::getSingleton('hackathon_gamification/achievement_score');
        $score->set($score->get() + 1);
    }

}