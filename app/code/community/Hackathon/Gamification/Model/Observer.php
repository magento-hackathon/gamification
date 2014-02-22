<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    Hackathon
 * @package     Hackathon_Gamification
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @generator   http://www.mgt-commerce.com/kickstarter/ Mgt Kickstarter
 */

class Hackathon_Gamification_Model_Observer 
{
    public function trackEvent(Varien_Event_Observer $observer)
    {
        $rules = Mage::getModel('hackathon_gamification/rule')->getCollection()
            ->addFieldToFilter('event_name', $observer->getEvent()->getName());
        foreach ($rules->getItems() as $rule) {
            if ($rule->isConditionTrue($observer)) {
                Mage::log('yeah, execute something');
            }
        }
    }
}