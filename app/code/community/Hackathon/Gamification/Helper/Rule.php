<?php
class Hackathon_Gamification_Helper_Rule extends Mage_Core_Helper_Abstract
{
    public function getEventsForForm()
    {
        $return = array();
        $events = Mage::getConfig()->getNode('global/hackathon_gamification_events');
        foreach ($events as $eventName => $configNode) {
            $return[] = array(
                'value' => $eventName,
                'label' => (string)$configNode->label,
            );
        }
        return $return;
    }

    public function getEventForm($sEventName)
    {
        $alias = (string)Mage::getConfig()->getNode('global/hackathon_gamification_events/' . $sEventName . '/condition_form');
        if ($alias) {
            $form = Mage::getModel($alias);
            return $form;
        }
    }
}
