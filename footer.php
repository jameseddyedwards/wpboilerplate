<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage wpboilerplate
 * @since wpboilerplate 1.0
 */

?>

</section>

<footer>
	<section class="block">
		<!-- Footer Navigation -->
		<nav class="navigation" role="secondary navigation">
			<?php /* Our footer navigation menu. */ ?>
			<?php wp_nav_menu(array(
				'theme_location'	=> 'navigation-footer',
				'items_wrap'      	=> '<ul>%3$s</ul>',
				'container'			=> false
			)); ?>
		</nav>

		<?php wp_footer(); ?>
	</section>
</footer>

</body>
</html>