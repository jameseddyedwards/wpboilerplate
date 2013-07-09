<?php
	/**
	 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
	 */
	add_action('wp_enqueue_scripts', 'add_my_stylesheets');
	$version = "0.0.1";

	/**
	 * Enqueue plugin style-file
	 */
	function add_my_stylesheets() {
		// Global Stylesheets
		wp_register_style('reset', get_template_directory_uri() . '/css/reset.css', __FILE__);
		wp_register_style('fonts', get_template_directory_uri() . '/css/fonts.css', __FILE__);
		wp_register_style('structure', get_template_directory_uri() . '/css/structure.css', __FILE__);
		wp_register_style('global', get_template_directory_uri() . '/css/global.css', __FILE__);
		wp_register_style('lists', get_template_directory_uri() . '/css/lists.css', __FILE__);
		wp_register_style('forms', get_template_directory_uri() . '/css/forms.css', __FILE__);
		wp_register_style('buttons', get_template_directory_uri() . '/css/buttons.css', __FILE__);
		wp_register_style('utilities', get_template_directory_uri() . '/css/utilities.css', __FILE__);
		
		wp_enqueue_style('reset');
		wp_enqueue_style('fonts');
		wp_enqueue_style('structure');
		wp_enqueue_style('global');
		wp_enqueue_style('lists');
		wp_enqueue_style('forms');
		wp_enqueue_style('buttons');
		wp_enqueue_style('utilities');

		// Page Specific Stylesheets
		if (is_front_page()) {
			wp_register_style('home', get_template_directory_uri() . '/css/home.css', __FILE__);
			wp_enqueue_style('home');
		} else if (is_page()) {
			wp_register_style('page', get_template_directory_uri() . '/css/page.css', __FILE__);	
			wp_register_style('comments', get_template_directory_uri() . '/css/comments.css', __FILE__);	
			wp_enqueue_style('page');
			wp_enqueue_style('comments');
		} else if (is_category()) {
			wp_register_style('category', get_template_directory_uri() . '/css/category.css', __FILE__);
			wp_enqueue_style('category');
		} else if (is_single()) {
			wp_register_style('post', get_template_directory_uri() . '/css/post.css', __FILE__);
			wp_register_style('recommended', get_template_directory_uri() . '/css/recommended.css', __FILE__);
			wp_register_style('comments', get_template_directory_uri() . '/css/comments.css', __FILE__);
			wp_enqueue_style('post');
			wp_enqueue_style('recommended');
			wp_enqueue_style('comments');
		} else if (is_search()) {
			wp_register_style('search', get_template_directory_uri() . '/css/search.css', __FILE__);
			wp_enqueue_style('search');
		}


	}
?>