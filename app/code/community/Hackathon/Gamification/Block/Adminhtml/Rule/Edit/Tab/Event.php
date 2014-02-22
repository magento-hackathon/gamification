<?php

class Hackathon_Gamification_Block_Adminhtml_Rule_Edit_Tab_Event extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareLayout()
    {
        $this->setChild('continue_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('catalog')->__('Continue'),
                    'onclick'   => "setSettings('".$this->getContinueUrl()."','event_name')",
                    'class'     => 'save'
                ))
        );
        return parent::_prepareLayout();
    }

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('event', array('legend'=>Mage::helper('hackathon_gamification')->__('Create Event Rule')));
        $fieldset->addField('event_name', 'select', array(
            'label' => Mage::helper('hackathon_gamification')->__('Event Name'),
            'title' => Mage::helper('hackathon_gamification')->__('Event Name'),
            'name'  => 'event_name',
            'values'=> Mage::helper('hackathon_gamification/rule')->getEventsForForm()
        ));

        $fieldset->addField('continue_button', 'note', array(
            'text' => $this->getChildHtml('continue_button'),
        ));

        $this->setForm($form);
    }

    public function getContinueUrl()
    {
        return $this->getUrl('*/*/new', array(
            '_current'   => true,
            'event_name' => '{{event_name}}'
        ));
    }

    public function _toHtml()
    {
        $sHtml = parent::_toHtml();
        $sHtml .= '
            <script type="text/javascript">
                var productTemplateSyntax = /(^|.|\r|\n)({{(\w+)}})/;
                function setSettings(urlTemplate, eventName) {
                    var template = new Template(urlTemplate, productTemplateSyntax);
                    setLocation(template.evaluate({event_name:$F(eventName)}));
                }
            </script>
        ';
        return $sHtml;
    }
}
