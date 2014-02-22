<?php
// add some sample data to the rule table
$rule = Mage::getModel('hackathon_gamification/rule');
$rule->setEventName('sales_quote_remove_item');
$rule->setAchievementModel('hackathon_gamification/achievement_score_decrement');
$rule->save();