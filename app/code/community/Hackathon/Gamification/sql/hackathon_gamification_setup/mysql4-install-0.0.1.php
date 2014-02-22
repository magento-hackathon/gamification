<?php

/** @var Mage_Core_Model_Resource_Setup $oInstaller */
$oInstaller = $this;

$oInstaller->startSetup();

/**
 * Create table hackathon_gamification_rule
 */
$oTable = $oInstaller->getConnection()
    ->newTable($oInstaller->getTable('hackathon_gamification_rule'))
    ->addColumn(
        'id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        )
    )
    ->addColumn(
        'event_name',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => false,
        )
    )
    ->addColumn(
        'customer_group_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'nullable'  => false,
        )
    )
    ->addColumn(
        'condition',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        null,
        array(
            'nullable'  => false,
        )
    );

$oInstaller->getConnection()->createTable($oTable);

$oInstaller->getConnection()->addKey(
    $oInstaller->getTable('hackathon_gamification_rule'),
    'event_name_key',
    array('event_name')
);

$oInstaller->endSetup();
