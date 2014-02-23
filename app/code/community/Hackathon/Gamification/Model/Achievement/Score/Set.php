<?php
class Hackathon_Gamification_Model_Achievement_Score_Set extends Mage_Core_Model_Abstract
{
    public function gain($achievementData) {
        $score = Mage::getSingleton('hackathon_gamification/achievement_score');
        $score->set($achievementData->value);
    }

    public function getForm(Varien_Data_Form $oForm) {
        return Mage::app()->getLayout()->createBlock('hackathon_gamification/adminhtml_achievement_score_set_form')->getForm($oForm);
    }
}