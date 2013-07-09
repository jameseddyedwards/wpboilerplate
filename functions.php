<?php
/**
 * wpboilerplate functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, wpboilerplate_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We arLeave a Replye providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'wpboilerplate_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage wpboilerplate
 * @since wpboilerplate 1.0
 */

/* Includes */
include TEMPLATEPATH . '/inc/styles.php';
include TEMPLATEPATH . '/inc/scripts.php';
include TEMPLATEPATH . '/inc/images.php';
include TEMPLATEPATH . '/inc/shortcodes.php';
include TEMPLATEPATH . '/inc/utilities.php';
include TEMPLATEPATH . '/inc/posts.php';


/**
 * Add theme support
 */
add_theme_support('menus');
register_nav_menu('community', __('Community Navigation', 'wpboilerplate'));
register_nav_menu('navigation', __('Navigation', 'wpboilerplate'));
register_nav_menu('navigation-footer', __('Footer Navigation', 'wpboilerplate'));
register_nav_menu('navigation-footer-sub', __('Footer Sub Navigation', 'wpboilerplate'));

// Add default posts and comments RSS feed links to <head>.
add_theme_support('automatic-feed-links');

// This theme supports a variety of post formats.
add_post_type_support('article', 'post-formats');




/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override wpboilerplate_setup() in a child theme, add your own wpboilerplate_setup to your child theme's
 * functions.php file.
*
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since wpboilerplate 1.0
 */
function wpboilerplate_setup() {

	/* Make wpboilerplate available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on wpboilerplate, use a find and replace
	 * to change 'wpboilerplate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('wpboilerplate', TEMPLATEPATH . '/languages');

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if (is_readable($locale_file)) {
		require_once($locale_file);

	}

	/**
	 * Sets the post excerpt length to 40 words.
	 *
	 * To override this length in a child theme, remove the filter and add your own
	 * function tied to the excerpt_length filter hook.
	**/

	function wpboilerplate_excerpt_length($length) {
		return 6;
	}
	function new_excerpt_more($more) {
		return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	add_filter('excerpt_length', 'wpboilerplate_excerpt_length');
	
}
add_action('after_setup_theme', 'wpboilerplate_setup');


/*
 * Adds parent class onto menu parents
*/
function add_menu_parent_class( $items ) {
	
	$parents = array();
	foreach ($items as $item) {
		if ($item->menu_item_parent && $item->menu_item_parent > 0) {
			$parents[] = $item->menu_item_parent;
		}
	}
	
	foreach ($items as $item) {
		if (in_array($item->ID, $parents)) {
			$item->classes[] = 'menu-parent-item'; 
		}
	}
	
	return $items;    
}
add_filter('wp_nav_menu_objects', 'add_menu_parent_class');

?>