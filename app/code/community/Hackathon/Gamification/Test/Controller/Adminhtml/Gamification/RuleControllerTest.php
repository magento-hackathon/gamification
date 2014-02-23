<?php

/**
 * Class Hackathon_Gamification_Test_Controller_Adminhtml_Gamification_RuleControllerTest
 *
 * @dataProviderFile rule
 */
class Hackathon_Gamification_Test_Controller_Adminhtml_Gamification_RuleControllerTest
    extends EcomDev_PHPUnit_Test_Case_Controller
{
    /**
     * @testdox Deletes a single rule
     * @testdox Shows success message on deletion
     *
     * @loadFixture rule
     */
    public function testDeletesASingleRule()
    {
        $this->markTestSkipped('Can not be tested due to naming of fields with mysql keywords ("condition").');
        return;

        /*
         * precondition
         */
        $this->mockAdminUserSession();

        $rule = Mage::getModel('hackathon_gamification/rule')->load(1337);
        $this->assertNotNull($rule->getId());

        $route = 'adminhtml/gamification_rule/delete';

        $this->dispatch($route, array('id' => 1337));

        /*
         * main
         */
        $this->assertRequestRoute($route);


        /*
         * post-condition
         */
    }

    /**
     * @dataProvider dataProvider
     * @loadExpectation rules
     *
     * @param $data
     */
    public function testSavesRules($data)
    {
        /*
         * precondition
         */
        $this->mockAdminUserSession();

        $ruleModel = Mage::getModel('hackathon_gamification/rule');
        $backupAmount = $ruleModel->getCollection()->count();

        $route = 'adminhtml/gamification_rule/save';

        $this->app()->getRequest()->setPost($data);
        $this->app()->getRequest()->setMethod('POST');
        $this->dispatch($route);

        /*
         * main
         */
        $this->assertRequestRoute($route);

        $this->assertEquals($backupAmount+1, $ruleModel->getCollection()->count());

        $rule = $ruleModel->getCollection()->getLastItem();

        $dataSet = $rule->getData();
        unset($dataSet[$rule->getIdFieldName()]);

        $this->assertEquals($this->expected($rule->getEventName())->getData(), $dataSet);

        /*
         * post-condition
         */
        $rule->delete();
    }

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
