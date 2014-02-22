<?php

class Hackathon_Gamification_Block_Adminhtml_Rule_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $sEventName = $this->getRequest()->getParam('event_name', false);
        if (!$sEventName && Mage::registry('gamification_rule_data')) {
            $sEventName = Mage::registry('gamification_rule_data')->getData('event_name');
        }
        $oForm = new Varien_Data_Form(
            array(
                'id'      => 'edit_form',
                'action'  => $this->getUrl(
                        '*/*/save',
                        array(
                            '_current' => true,
                            'id' => $this->getRequest()->getParam('id')
                        )
                    ),
                'method'  => 'post',
                'enctype' => 'multipart/form-data'
            )
        );

        if ($sEventName) {
            $oForm->addField(
                'event_name',
                'hidden',
                array(
                    'name'  => 'event_name',
                    'value' => $sEventName
                )
            );
        }

        $oForm->setUseContainer(true);
        $this->setForm($oForm);
        return parent::_prepareForm();
    }
}