<?php
class Hackathon_Gamification_Block_Adminhtml_Rule_Grid_Renderer_Achievement_Data extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('shackathon_gamification/rule/grid/renderer/condition.phtml');
        return $this;
    }

    public function render(Varien_Object $oRow)
    {
        $this->setCondition(json_decode($oRow->achievement_data, true));
        return $this->toHtml();
    }
}
