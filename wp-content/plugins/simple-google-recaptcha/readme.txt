=== Simple Google reCAPTCHA ===
Contributors: Minor
Tags: recaptcha, spam, block, captcha, bots, brute, force, protect, comments, secure, attack, registration, reset, form, buddypress, woocommerce, google
Requires at least: 4.2.0
Tested up to: 5.2
Stable tag: 2.9
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Donate link: https://www.paypal.me/NovaMi

Simply protect your WordPress against spam comments and brute-force attacks thanks to Google reCAPTCHA for free and without ads!

== Description ==
Simple Google reCAPTCHA will protect your WordPress! No more spam comments and brute-force attacks against user accounts. Lightweight plugin - just few KBs to download and no ads! BuddyPress and WooCommerce support.

= What is protected with reCAPTCHA? =
* Comment form
* New password form
* Registration form
* Login form
* Reset password form

reCAPTCHA verification will be required just for not registered users!

= Thank you! =
Thanks all of you, who are using this plugin. I really appreciate it! WordPress is amazing open-source software which I'm using for free (for business too) so this plugin is my way how to say thank you!
If you write to me (on support center etc.) and expect an answer, be patient, please. I'm working on this plugin in my free time, it's my hobby.


== Installation ==
1. Upload Simple Google reCAPTCHA files to the "/wp-content/plugins/simple-google-recaptcha" directory, or install Simple Google reCAPTCHA through the WordPress Plugins page directly.
2. Activate Simple Google reCAPTCHA through the WordPress Plugins page.
3. Use the menu Settings => reCAPTCHA to configure Simple Google reCAPTCHA.

== Frequently Asked Questions ==
= Why to install this plugin? =
Just pure protection - no ads and any other unnecessary changes.

= How to disable this plugin? =
Just use standard Plugin overview page in WordPress admin section and deactivate it or rename plugin folder /wp-content/plugins/simple-google-recaptcha over FTP access.

== Screenshots ==
1. Simple Google reCAPTCHA - Add new comment form
2. Simple Google reCAPTCHA - New password form
3. Simple Google reCAPTCHA - Registration form
4. Simple Google reCAPTCHA - Login form
5. Simple Google reCAPTCHA - Settings

== Changelog ==
= 2.9 =
* New: Option for disable reCAPTCHA on login page
* New: Error message instead of redirecting to the error page, besides the case of posting comments
* Bugfix: Loading Js file on unique HTML element to avoid collision

= 2.8 =
* Warning: New logic - Google reCAPTCHA js file will be loaded in the background on every page for non logged in users
* Warning: If Google reCAPTCHA verification fail, response code is 403 instead of 500 now. Thank you for contribution, Sara Kozińska!
* Bugfix: WooCommerce problem (JSON.parse error) in checkout process has been fixed. I'm sorry for a really big delay!

= 2.7 =
* Bugfix: Loading of Google reCAPTCHA form failed in some rare cases

= 2.6 =
* Bugfix: Fatal error on websites running on PHP 5

= 2.5 =
* Warning: Removed javascript function which disabling/enabling submit button If reCAPTCHA was passed, because of incompatibility with some websites in specific cases
* Bugfix: WooCommerce - If you have activated login and register form on one page, reCAPTCHA verification is require too for register
* New: Added uninstall script which clean settings from DB while uninstall process
* New: If you activate plugin and site or secret key is empty, you will be redirect to settings page

= 2.4 =
* New: reCAPTCHA verification added on every page that allows comments (not bothering registered users)

= 2.3 =
* New: Added donate link, you can buy me a coffee now :-)
* Bugfix: Plugin warnings on php7 - not quoted functions name

= 2.2 =
* Warning: Possibility to decide when reCAPTCHA will be shown was removed (not bothering registered users)
* New: Including BuddyPress and WooCommerce support
* Bugfix: Incompatibility with translations

= 2.1 =
* Bugfix: No more unnecessary loading reCAPTCHA on the other pages
* Bugfix: No more reCAPTCHA window over Clef waves (if you are using Clef plugin) on the login page


= 2.0 =
* Warning: reCAPTCHA verification on the BuddyPress registration page has been removed
* Warning: reCAPTCHA verification on the Add new comment form for logged in users has been removed
* Warning: Due to keep Simple Google reCAPTCHA as simple as possible some configuration options were removed
* New: Language settings of reCAPTCHA is based on WordPress locale now
* New: Default WordPress submit buttons are disabled until reCAPTCHA isn't solved
* New: Added reCAPTCHA for Resset password form
* Update: Text corrections
* Bugfix: reCAPTCHA verification just on the standard WordPress pages (unmodified by plugins/templates)

= 1.9 =
* Warning: Probably you will need to do a new translations
* New: Possibility to set language of reCAPTCHA
* Update: Minor updates for easier official translations

= 1.8 =
* New: reCAPTCHA verification on the BuddyPress registration page
* Bugfix: Translatable back button "Zpět"

= 1.7 =
* New: You can choose where reCAPTCHA will be required
* Bugfix: reCAPTCHA will be required only If a form has been submitted

= 1.6 =
* Bugfix: Name of settings has been changed - to avoid conflict with other plugins

= 1.5 =
* New: Possibility to disable reCAPTCHA in comment form for logged in users

= 1.4 =
* Update: Encoding has been converted from Windows to Unix
* Update: Text corrections

= 1.3 =
* New: Added "Settings" button to WordPress plugins page
* New: reCAPTCHA is required only after filled in settings
* Update: Text domain has been changed from simple-google-recaptcha to sgr - need to set up keys again

= 1.2 =
* Update: Simple Google reCAPTCHA folder - unnecessary files were deleted

= 1.1 =
* Update: Screenshots
* Update: Text corrections
* Bugfix: Logged in users are able to post comments

= 1.0 =
* New: Simple Google reCAPTCHA has been released!