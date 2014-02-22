<?php
// add some sample data to the rule table
$rule = Mage::getModel('hackathon_gamification/rule');
$rule->setEventName('checkout_cart_add_product_complete');
$rule->setAchievementModel('hackathon_gamification/achievement_badge');
$rule->save();