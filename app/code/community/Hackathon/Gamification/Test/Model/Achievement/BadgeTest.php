<?php

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 2/22/14
 * Time: 4:00 PM
 */
class Hackathon_Gamification_Model_Achievement_BadgeTest extends EcomDev_PHPUnit_Test_Case
{
    public function testFlagsThatBadgeIsGainedInSession()
    {
        /*
         * precondition
         */
        $this->mockSession('core/session', array('foo'));

        $badge = Mage::getModel('hackathon_gamification/achievement_badge');

        $session = Mage::getSingleton('core/session');

        $backupAchievementBadge = $session->getAchievementBadge();
        $session->setAchievementBadge(false);

        /*
         * main test
         */
        $badge->gain();
        $this->assertTrue($session->getAchievementBadge());

        /*
         * postcondition and clean up
         */
        $session->setAchievementBadge($backupAchievementBadge);
    }
}
