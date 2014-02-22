<?php

class Hackathon_Gamification_Block_Adminhtml_Rule_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Initialize Tabs
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('rule_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(
            Mage::helper('hackathon_gamification')
                ->__('Rule Information')
        );
    }

    /**
     * @return Mage_Core_Block_Abstract
     */
    protected function _beforeToHtml()
    {
        if ($this->getRequest()->getParam('id', false) || $this->getRequest()->getParam('event_name', false)) {
            $sEventName = $this->getRequest()->getParam('event_name', false);
            if (!$sEventName) {
                $sEventName = Mage::registry('gamification_rule_data')->getData('event_name');
            }

            $oEventForm = Mage::helper('hackathon_gamification/rule')->getEventForm($sEventName);
            if ($oEventForm) {
                $this->addTab(
                    'condition',
                    array(
                        'label' => Mage::helper('hackathon_gamification')
                                ->__('Rule Condition'),
                        'title' => Mage::helper('hackathon_gamification')
                                ->__('Rule Condition'),
                        'content' => $this
                                ->getLayout()
                                ->createBlock('hackathon_gamification/adminhtml_rule_edit_tab_condition')
                                ->toHtml(),
                    )
                );
            }

            $this->addTab(
                'achievement',
                array(
                    'label' => Mage::helper('hackathon_gamification')
                            ->__('Achievement'),
                    'title' => Mage::helper('hackathon_gamification')
                            ->__('Achievement'),
                    'content' => $this
                            ->getLayout()
                            ->createBlock('hackathon_gamification/adminhtml_rule_edit_tab_achievement')
                            ->toHtml(),
                )
            );
        } else {
            $this->addTab(
                'form_section',
                array(
                    'label' => Mage::helper('hackathon_gamification')
                            ->__('Rule Event'),
                    'title' => Mage::helper('hackathon_gamification')
                            ->__('Rule Event'),
                    'content' => $this
                            ->getLayout()
                            ->createBlock('hackathon_gamification/adminhtml_rule_edit_tab_event')
                            ->toHtml(),
                )
            );
        }

        return parent::_beforeToHtml();
    }
}