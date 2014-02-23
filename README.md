Hackathon_Gamification
=========================

Description
-----------
The Gamification module allows to track events stored by Hackathon_FrontendMonitoring and release actions like incrementing points, earn badges or cat stickers for a user.

Vision
------
If we do this the customers will be longer in the shop and buy more stuff.

Installation Instructions
-------------------------
Just install module, there's a sample data added, which gains you some nice ponys whenever you add something into the cart.
To modify that behavior the rules and achievements are managed in the hackathon_gamification_rule table.
To track a new event you have to add following snippet for your event in the config.xml to observe that:

    <frontend> <!-- we only consider observers in frontend, we don't want gamification in adminhtml (yet) -->
        <controller_action_predispatch_catalogsearch_result_index>
            <observers>
                <hackathon_gamification> <!-- it has to be that name -->
                    <class>hackathon_gamification/observer</class> <!-- always trigger that class -->
                    <method>trackEvent</method> <!-- and that method, it's doing all the magic -->
                    <label>Search query</label> <!-- add a label so your admin knows what this is about -->
                    <condition_form>hackathon_gamification/adminhtml_validator_search_query_form</condition_form> <!-- add a condition form, if you need it for this event, e.g. only track a special search word in the search event -->
                    <validator>hackathon_gamification/validator_search_query</validator> <!-- add a validator for your conditions you entered -->
                </hackathon_gamification>
            </observers>
        </controller_action_predispatch_catalogsearch_result_index>
    </frontend>

To add a new achievement which can be configured use following sample:

    <hackathon_gamification>
        <achievements>
            <score_set>
                <label>Set absolute score</label>
                <class>hackathon_gamification/achievement_score_set</class> <!-- implement a getForm method on this model, to have a custom form in the adminhtml to add some custom data to this achievement, like the value of score or what badge should be changed -->
            </score_set>
        </achievements>
    </hackathon_gamification>

Uninstallation
--------------
- Remove all files
- Delete table hackathon_gamification_rule

ToDo & Ideas
------------
- store scores in database
- add more achievements and events/rules
- add connection to frontendmonitoring module, to track page views etc.

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/magento-hackathon/gamification/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

License
-------
[GNU General Public License, version 3 (GPLv3)](http://opensource.org/licenses/gpl-3.0)

PS: search for "iloveponys" in your magento search after installing this module ;)