<?php
class Hackathon_Gamification_Helper_Rule extends Mage_Core_Helper_Abstract
{
    public function getEventsForForm()
    {
        $return = array();
        foreach ($this->getEventsAsOptions() as $eventName => $label) {
            $return[] = array(
                'value' => $eventName,
                'label' => $label,
            );
        }
        return $return;
    }

    public function getObserverXPath($eventName = '*') {
        return 'frontend/events/' . $eventName . '/observers/hackathon_gamification';
    }

    public function getEventsAsOptions()
    {
        $return = array();
        $events = Mage::getConfig()->getXpath($this->getObserverXPath());
        foreach ($events as $configNode) {
            /* @var Mage_Core_Model_Config_Element $configNode */
            $eventName = $configNode->getParent()->getParent()->getName();
            $return[$eventName] = $configNode->label;
        }
        return $return;
    }

    public function getEventForm($eventName)
    {
        $alias = (string)current(Mage::getConfig()->getXpath($this->getObserverXPath($eventName) . '/condition_form'));
        if ($alias) {
            $block = Mage::app()->getLayout()->createBlock(trim($alias));
            if ($block) {
                return $block->getForm();
            }
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

    public function getAchievementForm(Varien_Data_Form $oForm, $achievementModel)
    {
        $model = Mage::getModel(trim($achievementModel));
        if ($oFormWithAchievementData = $model->getForm($oForm)) {
            return $oFormWithAchievementData;
        } else {
            return $oForm;
        }
        return null;
    }
}
