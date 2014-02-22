<?php
abstract class Hackathon_Gamification_Model_Validator extends Mage_Core_Model_Abstract
{
    abstract public function validate($conditionData = null);
}