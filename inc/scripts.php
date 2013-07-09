<?php
/*
 * WordPress Sample function and action
 * for loading scripts in themes
 */
 
// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook 

add_action('wp_enqueue_scripts', 'wpboilerplate_load_javascript_files');

// Register some javascript files, because we love javascript files. Enqueue a couple as well 

function wpboilerplate_load_javascript_files() {

	//wp_register_script('fitvids_js', get_template_directory_uri() . '/js/fitvids.js', array('jquery'), '1.0.0', true);
	wp_register_script('global_js', get_template_directory_uri() . '/js/global.js', array('jquery'), '1.0.0', true);
	//wp_register_script('gridpak_js', get_template_directory_uri() . '/js/gridpak.js', array('jquery'), '1.0.0', true);
	wp_register_script('retina_js', get_template_directory_uri() . '/js/retina.js', array('jquery'), '1.0.0', true);


	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if (is_singular() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	if (is_front_page()) {
		wp_register_script('wpboilerplate_carousel', get_template_directory_uri() . '/js/plugin/jquery.carouFredSel.js', array('jquery'), '6.1.0', true);
		wp_enqueue_script('wpboilerplate_carousel');
	}
	if (is_category()) {
		wp_register_script('wpboilerplate_category', get_template_directory_uri() . '/js/category.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('wpboilerplate_category');
	}
	
	//wp_enqueue_script('fitvids_js');
	wp_enqueue_script('global_js');
	wp_enqueue_script('retina_js');
	//wp_enqueue_script('gridpak_js');

}

?>