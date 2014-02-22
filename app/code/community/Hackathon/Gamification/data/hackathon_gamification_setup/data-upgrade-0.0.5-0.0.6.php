<?php
// add some sample data to the rule table
$rule = Mage::getModel('hackathon_gamification/rule');
$rule->setEventName('controller_action_predispatch_catalogsearch_result_index');
$rule->setCondition(json_encode(array('query' => 'iloveponys')));
$rule->setAchievementModel('hackathon_gamification/achievement_score_set');
$rule->setAchievementData(json_encode(array('value' => 10)));
$rule->save();
