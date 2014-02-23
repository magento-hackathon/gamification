<?php

class Hackathon_Gamification_Block_Adminhtml_Rule_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Initialize Grid
     */
    public function __construct ()
    {
        parent::__construct();
        $this->setId('gamificationRuleGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $oCollection = Mage::getModel('hackathon_gamification/rule')
            ->getCollection();
        $this->setCollection($oCollection);
        return parent::_prepareCollection();
    }

    /**
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            array(
                'header' => Mage::helper('hackathon_gamification')
                        ->__('ID'),
                'align'  => 'right',
                'width'  => '50px',
                'index'  => 'id',
            )
        );

        $this->addColumn(
            'event_name',
            array(
                'header' => Mage::helper('hackathon_gamification')
                        ->__('Event Name'),
                'align'  => 'left',
                'index'  => 'event_name',
                'type'    => 'options',
                'options' => Mage::helper('hackathon_gamification/rule')->getEventsAsOptions(),
                'width'  => '350px',
            )
        );

        $this->addColumn(
            'condition',
            array(
                'header' => Mage::helper('hackathon_gamification')
                        ->__('Conditions'),
                'align'    => 'left',
                'index'    => 'condition',
                'filter'   => false,
                'sortable' => false,
                'renderer' => 'hackathon_gamification/adminhtml_rule_grid_renderer_condition'
            )
        );

        $this->addColumn(
            'achievement_model',
            array(
                'header' => Mage::helper('hackathon_gamification')
                        ->__('Achievement Model'),
                'align'  => 'left',
                'index'  => 'achievement_model',
                'type'    => 'options',
                'options' => Mage::helper('hackathon_gamification/rule')->getAchievementModelsOptions()
            )
        );

        $this->addColumn(
            'achievement_data',
            array(
                'header' => Mage::helper('hackathon_gamification')
                        ->__('Achievement Data'),
                'align'    => 'left',
                'index'    => 'achievement_data',
                'filter'   => false,
                'sortable' => false,
                'renderer' => 'hackathon_gamification/adminhtml_rule_grid_renderer_achievement_data'
            )
        );

        $this->addColumn(
            'action',
            array(
                'header'    => Mage::helper('hackathon_gamification')
                        ->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption' => Mage::helper('hackathon_gamification')
                                ->__('Edit'),
                        'url'     => array('base' => '*/*/edit'),
                        'field'   => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
            )
        );

        return parent::_prepareColumns();
    }

    /**
     * @param Varien_Object $row
     * @return string
     */
    public function getRowUrl ($oRow)
    {
        return $this->getUrl('*/*/edit', array('id' => $oRow->getId()));
    }
}
