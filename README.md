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
To track a new event you have to add following snippet for your event in the config.xml:

    <checkout_cart_add_product_complete>
        <observers>
            <hackathon_gamification>
                <class>hackathon_gamification/observer</class>
                <method>trackEvent</method>
            </hackathon_gamification>
        </observers>
    </checkout_cart_add_product_complete>

Uninstallation
--------------
- Remove all files
- Delete table hackathon_gamification_rule

ToDo & Ideas
------------
- Manage rules and achievements in adminhtml backend
- Implement condition rules
-- need a product from every category
-- aggregate logged events from hackathon_frontendmonitoring (i.e. gain an achievement after 5 actions)
-- check that user did not already get that achievement
- store scores in database
- Implement achievement data (i.e. set different scores for different events)

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/magento-hackathon/gamification/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

License
-------
[GNU General Public License, version 3 (GPLv3)](http://opensource.org/licenses/gpl-3.0)