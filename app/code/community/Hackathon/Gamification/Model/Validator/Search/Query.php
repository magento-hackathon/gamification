<?php
class Hackathon_Gamification_Model_Validator_Search_Query extends Hackathon_Gamification_Model_Validator
{
    public function validate($conditionData = null) {
        return (Mage::app()->getRequest()->getParam('q') == $conditionData->query);
    }
}