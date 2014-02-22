<?php
class Hackathon_Gamification_Helper_Rule extends Mage_Core_Helper_Abstract
{
    public function getEventsForForm()
    {
        $return = array();
        $events = Mage::getConfig()->getNode('global/hackathon_gamification/events')->asArray();
        foreach ($events as $eventName => $configNode) {
            $return[] = array(
                'value' => $eventName,
                'label' => $configNode['label'],
            );
        }
        return $return;
    }

    public function getEventForm($sEventName)
    {
        $alias = (string)Mage::getConfig()->getNode('global/hackathon_gamification/events/' . $sEventName . '/condition_form');
        if ($alias) {
            $block = Mage::app()->getLayout()->createBlock(trim($alias));
            return $block->getForm();
        }
        return null;
    }

    public function getAchievementModelsForForm()
    {
        $return = array();
        $achievements = Mage::getConfig()->getNode('global/hackathon_gamification/achievements')->asArray();
        foreach ($achievements as $configNode) {
            $return[] = array(
                'value' => $configNode['class'],
                'label' => $configNode['label'],
            );
        }
        return $return;
    }

    public function getAchievementModelsOptions()
    {
        $return = array();
        $achievements = Mage::getConfig()->getNode('global/hackathon_gamification/achievements')->asArray();
        foreach ($achievements as $configNode) {
            $return[$configNode['class']] = $configNode['label'];
        }
        return $return;
    }
}
