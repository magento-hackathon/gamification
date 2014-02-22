<?php

/**
 * Class Hackathon_Gamification_Test_Helper_RuleTest
 *
 * @dataProviderFile eventsForForm
 */
class Hackathon_Gamification_Test_Helper_RuleTest extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @loadExpectation eventsForForm
     */
    public function testDeliversEventsForFormsThatAreConfiguredForGamification()
    {
        /*
         * precondition
         */
        $helper = Mage::helper('hackathon_gamification/rule');

        /*
         * main
         */
        $expected = $this->expected()->getData();

        foreach ($expected as $sEventName => $events)
        {
            if (!$events['condition_form'])
            {
                continue;
            }

            /** @var Mage_Core_Block_Abstract $form */
            $form = $helper->getEventForm($sEventName);
            $this->assertNotNull($form);
            $this->assertInstanceOf('Varien_Data_Form', $form);
        }

        /*
         * post-conditino
         */
    }

}
