<?php

/** @var Mage_Core_Model_Resource_Setup $oInstaller */
$oInstaller = $this;

$oInstaller->startSetup();

$oInstaller->getConnection()->addColumn(
    $this->getTable('hackathon_gamification_rule'),
    'achievement_model',
    'VARCHAR(255)'
);

$oInstaller->getConnection()->addColumn(
    $this->getTable('hackathon_gamification_rule'),
    'achievement_data',
    'TEXT'
);

$oInstaller->endSetup();
