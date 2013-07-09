<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage wpboilerplate
 * @since wpboilerplate 1.0
 */

get_header();

?>

<div class="container content">
	<?php if (have_posts()) : ?>

		<!-- Post List -->
		<div class="row">
			<?php while (have_posts()) : the_post(); ?>
				<div class="span4">
					<a class="post-thumb" href="<?php the_permalink(); ?>">
						<?php echo ah_get_custom_thumb(); ?>
						<span class="title"><?php the_title(); ?></span>
					</a>
					<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
				</div>
			<?php endwhile; ?>
		</div>

	<?php else : ?>

		<div class="row">
			<div class="span12">
				<h1>No Results Found</h1>
				<p><?php _e('Unfortunately nothing can be found relating to your search. Why not try searching for a more generic keyword:', 'wpboilerplate'); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
		
	<?php endif; ?>

</div>

<?php get_footer(); ?>