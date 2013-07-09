<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and the sites header and navigation menu
 *
 * @package WordPress
 * @subpackage wpboilerplate
 * @since wpboilerplate 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
	<html class="ie ie6 ltie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
	<html class="ie ie7 ltie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
	<html class="ie ie8 ltie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
	<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
	<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<title>
<?php
	// Print the <title> tag based on what is being viewed.
	global $page, $paged;

	wp_title('|', true, 'right');

	// Add the blog name.
	bloginfo('wpboilerplate');

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		echo " | $site_description";
	}

	// Add a page number if necessary:
	if ($paged >= 2 || $page >= 2) {
		echo ' | ' . sprintf(__('Page %s', 'wpboilerplate'), max($paged, $page));
	}
?>
</title>

<!-- TypeKit -->
<script type="text/javascript" src="//use.typekit.net/adx5bpc.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();

?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part('content', 'body-scripts'); ?>

<div class="skip-link">
	<a class="assistive-text" href="#content" title="<?php esc_attr_e('Skip to primary content', 'wpboilerplate'); ?>">
		<?php _e('Skip to primary content', 'wpboilerplate'); ?>
	</a>
</div>

<header class="block">
	<nav class="community-nav" role="navigation">
		<?php wp_nav_menu(array(
			'theme_location'	=> 'community',
			'items_wrap'      	=> '<ul>%3$s</ul>',
			'container'			=> false
		)); ?>
	</nav>

	<a class="logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpboilerplate-logo.png" alt="<?php bloginfo('name'); ?>" width="94" />
	</a>

	<nav class="nav" role="navigation">
		<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
		<div class="skip-link"><a class="assistive-text" href="#body-content" title="<?php esc_attr_e('Skip to main content', 'wpboilerplate'); ?>"><?php _e('Skip to main content', 'wpboilerplate'); ?></a></div>
		
		<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
		<?php wp_nav_menu(array(
			'theme_location'	=> 'navigation',
			'items_wrap'      	=> '<ul>%3$s</ul>',
			'container'			=> false
		)); ?>
	</nav>

	<a class="sign-up button" href="/">Sign Up</a>
</header>

<?php // ID required for screen readers link ?>
<section id="body-content">


