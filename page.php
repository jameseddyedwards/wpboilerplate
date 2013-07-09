<?php
/**
 * The template for determining what layout to use for hierarchical pages, defaulting to a standard post layout.
 *
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage wpboilerplate
 * @since wpboilerplate 1.0
 */

get_header();

?>

<?php // ID required for screen readers link ?>
<section id="body-content">

	<?php while (have_posts()) : the_post(); ?>

		<?php if ($featureImageObj) { ?>
			<img class="feature-image" src="<?php echo $featureImageObj['sizes']['rectangle-xl']; ?>" alt="<?php echo $featureImageObj['alt']; ?>" />
		<?php } ?>
		
		<article class="block">

			<!-- Edit Post Link -->
			<?php edit_post_link( __('Edit', 'wpboilerplate')); ?>

			<h1><?php the_title(); ?></h1>

			
			<!-- The Content -->
			<?php the_content(); ?>


			<?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __( 'Pages:', 'wpboilerplate' ) . '</span>', 'after' => '</div>')); ?>

			<?php if (get_the_author_meta('description') && is_multi_author()) { // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
				<div id="author-info">
					<div id="author-avatar">
						<?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('wpboilerplate_author_bio_avatar_size', 68)); ?>
					</div>
					<div id="author-description">
						<h2><?php printf( esc_attr__( 'About %s', 'wpboilerplate' ), get_the_author() ); ?></h2>
						<?php the_author_meta( 'description' ); ?>
						<div id="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'wpboilerplate' ), get_the_author() ); ?>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
			
		</article>

	<?php endwhile; ?>
	
</section>

<?php get_footer(); ?>