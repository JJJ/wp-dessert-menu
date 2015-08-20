<?php

/**
 * Plugin Name: WP Dessert Menu
 * Plugin URI:  http://wordpress.org/extend/plugins/wp-dessert-menu/
 * Description: Put a WordPress navigation menu in your admin toolbar
 * Author:      John James Jacoby
 * Author URI:  http://jjj.me
 * Version:     1.1.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/** Example Function - Start Copying ******************************************/

/**
 * An example on how to use the Dessert Menu.
 *
 * Copy this function into your theme's functions.php, or a special plugin,
 * then rename your function and adjust it to suit your specific needs.
 *
 * Hook your custom function into the 'admin_bar_menu' action, with the name of
 * your custom function. The '1000' is roughly the 'order' that your menu will
 * get added, so you might need to tweak it to play nicely with other plugins
 * that are trying to add menus up there.
 *
 * In this example, we try to load a menu named 'Quick Links.' For this to work,
 * you need create a menu in Admin > Appearance > Menus named 'Quick Links.'
 *
 * @since WP_Dessert_Menu 1.0
 *
 * @param WP_Admin_Bar $wp_admin_bar The WordPress Admin bar
 *
 * @uses wp_dessert_menu To add a specific navigation menu to the admin bar
 */
function wp_dessert_menu_quick_links( WP_Admin_Bar $wp_admin_bar ) {

	// Sanity check on admin bar global
	if ( ! is_object( $wp_admin_bar ) ) {
		return;
	}

	/**
	 * You can put other logic here, like is_user_logged_in() checks to have
	 * custom menus for logged in/out users, etc...
	 */

	// Variables
	$menu_name  = 'Quick Links';       // The name of the menu you want to grab
	$menu_title = __( 'Quick Links' ); // The text of the root menu item
	$menu_link  = home_url();          // The link for the root menu item

	// This actually adds the menu.
	wp_dessert_menu( $wp_admin_bar, $menu_name, $menu_title, $menu_link );
}
add_action( 'admin_bar_menu', 'wp_dessert_menu_quick_links', 1000 );

/** Stop Copying **************************************************************/

/**
 * WP Dessert Menu
 *
 * This is the main function that will grab the nav menu you want, and recreate
 * them in the WordPress admin bar. See above for how to use it.
 *
 * @since WP_Dessert_Menu 1.0
 *
 * @param WP_Admin_Bar $wp_admin_bar The WordPress Admin bar
 * @param string $menu_name The name of the menu you want to grab
 * @param string $menu_title The text of the root menu item
 * @param string $menu_link The link for the root menu item
 */
function wp_dessert_menu( WP_Admin_Bar $wp_admin_bar, $menu_name = 'Quick Links', $menu_title = 'Quick Links', $menu_link = '#' ) {

	// Sanity check on admin bar global
	if ( ! is_object( $wp_admin_bar ) ) {
		return;
	}

	// Look for menu with the title passed, bail if empty
    if ( ! $menu = wp_get_nav_menu_object( $menu_name ) ) {
		return;
	}

	// Get the menu items, bail if empty
	if ( ! $menu_items = wp_get_nav_menu_items( $menu->term_id ) ) {
		return;
	}

	// Add the root menu
    $wp_admin_bar->add_menu( array(
        'id'    => 'wp-dessert-menu-' . $menu->term_id . '-item-0',
        'title' => $menu_title,
		'href'  => $menu_link,
    ) );

	// Loop through menu items
    foreach ( (array) $menu_items as $menu_item ) {

		// Add each menu item
        $wp_admin_bar->add_menu( array(
            'id'     => 'wp-dessert-menu-' . $menu->term_id . '-item-' . $menu_item->ID,
            'parent' => 'wp-dessert-menu-' . $menu->term_id . '-item-' . $menu_item->menu_item_parent,
            'title'  => $menu_item->title,
            'href'   => $menu_item->url,
            'meta'   => array(
                'title'  => $menu_item->attr_title,
                'target' => $menu_item->target,
                'class'  => implode( ' ', $menu_item->classes ),
            ),
        ) );
    }
}
