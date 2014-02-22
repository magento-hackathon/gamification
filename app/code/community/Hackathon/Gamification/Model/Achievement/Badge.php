<?php
class Hackathon_Gamification_Model_Achievement_Badge extends Hackathon_Gamification_Model_Achievement {
    public function gain() {
        Mage::getSingleton('core/session')->setAchievementBadge(true);
    }
}