<?php

class Hackathon_Gamification_Test_Model_Achievement_Score_SetTest extends EcomDev_PHPUnit_Test_Case
{
    public function testCanSetTheScoreToAnyLevel()
    {
        /*
         * precondition
         */
        $this->mockSession('core/session', array('foo'));

        $setter = Mage::getModel('hackathon_gamification/achievement_score_set');
        $scoreModel = Mage::getSingleton('hackathon_gamification/achievement_score');

        $backupScore = $scoreModel->get();

        $achievementData = new StdClass();
        $achievementData->value = 345;

        /*
         * main test
         */
        $setter->gain($achievementData);

        $this->assertSame($achievementData->value, $scoreModel->get());

        /*
         * post-condition and clean up
         */
        $scoreModel->set($backupScore);
    }
}
