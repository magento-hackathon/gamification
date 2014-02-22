<?php
class Hackathon_Gamification_Model_Achievement_Observer extends Mage_Core_Model_Abstract
{
    public function setAchievement(Varien_Event_Observer $observer) {
        // TODO this should be configurable in adminhtml, so what should actually be achieved for which rule
        Mage::getSingleton('core/session')->setAchievementBadge(true);
    }
}