<?php

class Hackathon_Gamification_Test_Model_Achievement_Score_IncrementTest extends EcomDev_PHPUnit_Test_Case
{
    public function testIncreasesScoreInSession()
    {
        /*
         * precondition
         */
        $this->mockSession('core/session', array('foo'));

        $scoreIncrement = Mage::getModel('hackathon_gamification/achievement_score_increment');

        $session = Mage::getSingleton('core/session');

        $backupAchievementBadge = $session->getAchievementScore();
        $score = mt_rand(32000, 65000);
        $session->setAchievementScore($score);

        $this->assertSame($score, $session->getAchievementScore());

        /*
         * main test
         */
        $scoreIncrement->gain();
        $this->assertSame($score + 1, $session->getAchievementScore());

        /*
         * post-condition and clean up
         */
        $session->setAchievementScore($backupAchievementBadge);
    }
}
