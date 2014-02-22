<?php

class Hackathon_Gamification_Test_Model_RuleTest extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @ loadFixture rule
     */
    public function testCanLoadRules()
    {
        $this->markTestSkipped(
            '"condition" is a mysql keyword and a "insert on duplicate key update" query will fail.'
        );

        return;
        /*
         * precondition
         */

        /*
         * main
         */
        $rule = Mage::getModel('hackathon_gamification/rule')->load(1337);

        $this->assertEquals(1337, $rule->getId());

        /*
         * post-condition
         */
    }

    public function testCanWriteRule()
    {
        /**
         * precondition
         */
        $this->mockSession('core/session', array('foo'));

        /*
         * main
         */
        $rule = Mage::getModel('hackathon_gamification/rule');

        $rule->setData(
            array(
                'event_name' => 'model_save_after',
                'customer_group_id' => 42,
                'condition' => '{"foo": "bar"}',
                'achievement_model' => 'hackathon_gamification/achievement_badge',
                'achievement_data' => '',
            )
        );

        $rule->save();

        $this->assertNotNull($rule->getId());

        /*
         * post-condition
         */
        $rule->delete();
    }

    /**
     * @ loadFixture rule
     */
    public function testValidatesConditions()
    {
        $this->markTestSkipped('can not use "condition" as field name. it is a mysql keyword');
        return;

        /*
         * precondition
         */
        $rule = Mage::getModel('hackathon_gamification/rule')->load(1337);

        $this->assertNotNull($rule->getId());

        /*
         * main
         */

        /*
         * post-conditino
         */
    }
} 
