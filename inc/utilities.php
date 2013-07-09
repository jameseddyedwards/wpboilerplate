<?php

/* Utility function for use across the wpboilerplate website */

// Checks to see if it's a localhost environment
function is_localhost() {
	return strpos($_SERVER['HTTP_HOST'], 'localhost') !== false ? true : false;
}

/* Returns an object of Data Sources
function get_data_sources() {
	// Data Sources
	return $dataSourcesArgs = new WP_Query(array(
		'post_type'		=> 'data-source',
	));
}
*/

/* Returns compiled HTML list of Data Sources
function data_sources() {

	$query = get_data_sources();

	if ($query->have_posts()) :
		echo '<div class="row data-source-thumbs">';
			while ($query->have_posts()) : $query->the_post();
				$image = get_field('data_source_logo');
				echo '<div class="span one">';
					echo '<a class="article-img" href="' . get_permalink() . '">';
						echo '<img src="' . $image['sizes']['thumbnail'] . '" alt="' . $image['alt'] . '" />';
						echo '<span class="source-name">' . get_the_title() . '</span>';
					echo '</a>';
				echo '</div>';
			endwhile;
		echo '</div>';
	endif;

	wp_reset_postdata();

}
*/


/* Returns an object of Data Enrichments
function get_enrichments() {
	$dataEnrichmentArgs = array(
		'post_type'		=> 'data-enrichments',
	);
	return get_posts($dataEnrichmentArgs);
}
*/


?>