<?php

class Hackathon_Gamification_Test_ConfigTest extends EcomDev_PHPUnit_Test_Case_Config
{
    public function testHasBlocksForFrontendAndBackend()
    {
        $this->assertBlockAlias('hackathon_gamification/badge', 'Hackathon_Gamification_Block_Badge');
        $this->assertBlockAlias('hackathon_gamification_adminhtml/rule', 'Hackathon_Gamification_Block_Adminhtml_Rule');
    }

    public function testHasHelper()
    {
        $helperAlias = 'hackathon_gamification';
        $this->assertHelperAlias($helperAlias, 'Hackathon_Gamification_Helper_Data');
        $this->assertSame('Hackathon_Gamification_Helper_Data', get_class(Mage::helper($helperAlias)));
    }

    public function testHasModelsForRulesAndAchievements()
    {
        $this->assertModelAlias('hackathon_gamification/rule', 'Hackathon_Gamification_Model_Rule');
        $this->assertModelAlias('hackathon_gamification_resource/rule', 'Hackathon_Gamification_Model_Resource_Rule');
    }

    public function testHasSetupScripts()
    {
        $this->assertSetupResourceExists('Hackathon_Gamification', 'hackathon_gamification_setup');
    }

    public function testIsInCommunityCodePool()
    {
        $this->assertModuleCodePool('community');
    }

    public function testListensIfAGamificationAchievementHasBeenReached()
    {
        $this->assertEventObserverDefined(
            'frontend',
            'hackathon_gamification_achievement',
            'hackathon_gamification/achievement_observer',
            'setAchievement'
        );
    }

    public function testListensIfAProductHasBeenAddedToCart()
    {
        $this->assertEventObserverDefined(
            'frontend',
            'checkout_cart_add_product_complete',
            'hackathon_gamification/observer',
            'trackEvent'
        );
    }

    public function testListensToEventModelSaveAfter()
    {
        $this->assertEventObserverDefined(
            'global',
            'model_save_after',
            'hackathon_gamification/observer',
            'modelSaveAfter'
        );

    }

    public function testListensToEventSaveAfterEvent()
    {
        $this->assertEventObserverDefined(
            'global',
            'model_save_after',
            'hackathon_gamification/observer',
            'modelSaveAfter'
        );
    }

    public function testVersionIsCoveredByUnitTests()
    {
        $this->assertModuleVersion('0.0.6');
    }

    public function testLayoutIsAddedToFrontendAndBackend()
    {
        $this->assertLayoutFileDefined('frontend', 'hackathon_gamification.xml');
        $this->assertLayoutFileExists('frontend', 'hackathon_gamification.xml');

        $this->assertLayoutFileDefined('adminhtml', 'hackathon_gamification.xml');
        $this->assertLayoutFileExists('adminhtml', 'hackathon_gamification.xml');
    }
}
