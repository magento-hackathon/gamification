<?php

class Hackathon_Gamification_Test_Model_Achievement_Score_DecrementTest extends EcomDev_PHPUnit_Test_Case
{
    public function testDecreasesScoreInSession()
    {
        /*
         * precondition
         */
        $this->mockSession('core/session', array('foo'));

        $scoreDecrement = Mage::getModel('hackathon_gamification/achievement_score_decrement');

        $session = Mage::getSingleton('core/session');

        $backupAchievementBadge = $session->getAchievementScore();
        $score = mt_rand(32000, 65000);
        $session->setAchievementScore($score);

        $this->assertSame($score, $session->getAchievementScore());

        /*
         * main test
         */
        $scoreDecrement->gain();
        $this->assertSame($score - 1, $session->getAchievementScore());

        /*
         * post-condition and clean up
         */
        $session->setAchievementScore($backupAchievementBadge);
    }
}
