<?php
// add some sample data to the rule table
$rule = Mage::getModel('hackathon_gamification/rule')->load('checkout_cart_add_product_complete', 'event_name');
$rule->setAchievementModel('hackathon_gamification/achievement_score_increment');
$rule->save();