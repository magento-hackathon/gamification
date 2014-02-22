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

class Hackathon_Gamification_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Store a line to the badges.
     *
     * @param string $message
     */
    public function appendBadge($message)
    {
        $badgeMessages = Mage::registry('hackathon_gamification_messages');
        $badgeMessages[] = $message;
        Mage::register('hackathon_gamification_messages', $badgeMessages);

        return $this;
    }

    /**
     * Retrieve the current stored badge messages.
     *
     * @return mixed
     */
    public function getBadges()
    {
        return Mage::registry('hackathon_gamification_messages');
    }

    /**
     * Increase or decrease the score of a customer
     * @param $value
     */
    public function addCustomerScore($value)
    {
        // $customer = Mage::getModel('customer/session')->getCustomer();
        // $score = $customer->getGamificationScore() + $value;
        // $customer->getCustomer()->setGamificationScore($score);

        return $this;
    }
}
