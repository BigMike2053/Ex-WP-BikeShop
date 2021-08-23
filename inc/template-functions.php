<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Bike_Shop
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bike_shop_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}

add_filter('body_class', 'bike_shop_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bike_shop_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}

add_action('wp_head', 'bike_shop_pingback_header');


function filter_the_content($content)
{
	return str_replace('wordpress', 'WordPress', $content);
}

add_filter('the_content', 'filter_the_content');


function add_super_admin($classes)
{
	if (is_super_admin()) {
		return array_merge($classes, ['super-admin']);
	}
	return $classes;
}
add_filter('body_class', 'add_super_admin');


function add_in_footer () {
	echo '<p>Site créé par Adrien LETERTRE</p>';
}
add_action('wp_footer','add_in_footer');

//CPT
require_once __DIR__ . '/../post-types/employee.php';
require_once __DIR__ . '/../post-types/testimony.php';



/* Flush rewrite rules for custom post types. */
add_action('after_switch_theme', 'flush_rewrite_rules');
