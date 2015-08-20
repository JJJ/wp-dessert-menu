=== WP Dessert Menu ===
Contributors: johnjamesjacoby
Tags: admin, menu, menus, nav, navigation
Requires at least: 4.3
Tested up to: 4.3
Stable tag: 1.1.0

== Description ==

Put a WordPress navigation menu in your admin toolbar

WP Snack Menu comes with a few filters to let you customize the menu if needed.

It comes fully documented to allow you to reuse it for any number of custom menus.

== Installation ==

* Place the 'wp-dessert-menu' folder in your '/wp-content/plugins/' directory
* Activate WP Dessert Menu
* Create a navigation menu in Admin > Appearance > Menus named 'Quick Links'
* To create custom menus, check out the fully documented code example in `wp-dessert-menu.php`

== Frequently Asked Questions ==

= Does this create new database tables? =

No. There are no new database tables with this plugin.

= Does this modify existing database tables? =

No. All of WordPress's core database tables remain untouched.

= Does this work with other plugins and themes? =

Maybe. This depends on how those plugins and themes were designed to work. Many plugins use `is_admin()` checks to make sure their code only executes within the dashboard, which means their menus will not appear when visiting the front-end of your site.

= Where can I get support? =

The WordPress support forums: https://wordpress.org/tags/wp-dessert-menu/

= Where can I find documentation? =

http://github.com/johnjamesjacoby/wp-dessert-menu/

== Changelog ==

= 1.1.0 =
* Refresh

= 1.0.1 =
* Add link parameter to set custom root level URL

= 1.0 =
* Public release
