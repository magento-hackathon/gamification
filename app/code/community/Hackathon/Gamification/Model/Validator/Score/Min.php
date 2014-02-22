<?php
class Hackathon_Gamification_Model_Validator_Score_Min extends Hackathon_Gamification_Model_Validator
{
    /**
     * validate if achievement score is greater than possible minimum
     *
     * @return bool
     */
    public function validate($conditionData = null) {
        return (Mage::getSingleton('core/session')->getAchievementScore() > 0);
    }
}