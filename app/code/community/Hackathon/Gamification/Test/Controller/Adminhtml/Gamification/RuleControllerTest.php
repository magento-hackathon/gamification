<?php

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 2/23/14
 * Time: 10:33 AM
 */
class Hackathon_Gamification_Test_Controller_Adminhtml_Gamification_RuleControllerTest
    extends EcomDev_PHPUnit_Test_Case_Controller
{
    public function testShowsAGridOfAllRules()
    {
        $this->mockAdminUserSession();

        $this->dispatch('adminhtml/gamification_rule');

        $this->assertRequestRoute('adminhtml/gamification_rule');

        $this->assertLayoutBlockCreated('gamification.rule');
        $this->assertLayoutBlockRendered('gamification.rule');
        $this->assertLayoutBlockInstanceOf('gamification.rule', 'Hackathon_Gamification_Block_Adminhtml_Rule');
    }
} 
