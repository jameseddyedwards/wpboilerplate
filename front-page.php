<?php
/**
 * The Front Page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage wpboilerplate
 */

get_header();

?>

<section id="body-content" class="block">
	<div class="row">
		<div class="span twelve">
			<h1>WP Boilerplate</h1>
		</div>
	</div>	
</section>

<?php get_footer(); ?>