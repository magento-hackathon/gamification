<?php

/**
 * Class Hackathon_Gamification_Test_Controller_Adminhtml_Gamification_RuleControllerTest
 *
 * @dataProviderFile rule
 */
class Hackathon_Gamification_Test_Controller_Adminhtml_IndexControllerTest
    extends EcomDev_PHPUnit_Test_Case_Controller
{
    /**
     * @testdox Deletes a single rule
     * @testdox Shows success message on deletion
     *
     * @ loadFixture rule
     */
    public function testIndex()
    {
        /*
         * precondition
         */
        $this->mockAdminUserSession();

        $route = 'adminhtml/gamification';

        $this->dispatch($route);

        /*
         * main
         */
        $this->assertRequestRoute($route);


        /*
         * post-condition
         */
    }
} 
