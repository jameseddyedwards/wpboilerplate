<?php
/**
 * The template for displaying search forms in wpboilerplate
 *
 * @package WordPress
 * @subpackage wpboilerplate
 * @since wpboilerplate 1.0
 */
?>

<form method="get" class="searchform" action="<?php echo esc_url(home_url( '/')); ?>">
	<fieldset class="single-input">
		<label for="s" class="assistive-text"><?php _e('Search', 'wpboilerplate'); ?></label>
		<input type="text" class="field" name="s" id="s" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'wpboilerplate' ); ?>" />
		<br class="clear" />
	</fieldset>
</form>
