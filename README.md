Hackathon_Gamification
=========================

Description
-----------
The Gamification module allows to track events stored by Hackathon_FrontendMonitoring and release actions like incrementing points, earn badges or cat stickers for a user.

Vision
------
If we do this the customers will be longer in the shop and buy more stuff.

Requirements
------------
tbd

Compatibility
-------------
tbd

Installation Instructions
-------------------------
Just install module, there's a sample data added, which gains you some nice ponys whenever you add something into the cart.
To modify that behavior the rules and achievements are managed in the hackathon_gamification_rule table.
To track a new event you have to add following snippet for your event in the config.xml to observe that:

    <checkout_cart_add_product_complete>
        <observers>
            <hackathon_gamification>
                <class>hackathon_gamification/observer</class>
                <method>trackEvent</method>
            </hackathon_gamification>
        </observers>
    </checkout_cart_add_product_complete>

To make a new event manageable in the adminhtml add following to global node:

    <hackathon_gamification_events>
        <sales_quote_remove_item>
            <label>Remove product from cart</label>
            <condition_form /> <!-- conditions form in adminhtml -->
            <validator>hackathon_gamification/validator_score_min</validator> <!-- i.e. do not go into a negative score range -->
        </sales_quote_remove_item>
    </hackathon_gamification_events>

Uninstallation
--------------
- Remove all files
- Delete table hackathon_gamification_rule

ToDo & Ideas
------------
- Manage rules and achievements in adminhtml backend
- store scores in database

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