<?php

/**
 * Remove standard image sizes so that these sizes are not
 * created during the Media Upload process
 *
 * Tested with WP 3.2.1
 *
 * Hooked to intermediate_image_sizes_advanced filter
 * See wp_generate_attachment_metadata( $attachment_id, $file ) in wp-admin/includes/image.php
 *
 * @param $sizes, array of default and added image sizes
 * @return $sizes, modified array of image sizes
 * @author Ade Walker http://www.studiograsshopper.ch
 */



/*
function remove_wmp_image_sizes($sizes) {
	//unset($sizes['thumbnail']);
	//unset($sizes['medium']);
	//unset($sizes['large']);
	//unset($sizes['full']);

	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_wmp_image_sizes');
*/

function custom_wmu_image_sizes($sizes) {
	unset($sizes['full'] );

	// Add wpboilerplate's custom image sizes
	add_theme_support('post-thumbnails');
	add_image_size('square-thumbnail', 195, 195, true);
	add_image_size('square-small', 404, 404, true);
	add_image_size('square-medium', 822, 822, true);
	add_image_size('square-large', 1240, 1240, true);
	add_image_size('rectangle-small', 613, 404, true);
	add_image_size('rectangle-medium', 822, 404, true);
	add_image_size('rectangle-large', 1240, 822, true);
	add_image_size('rectangle-wide', 1240, 404, true);
	add_image_size('rectangle-xl', 9999, 1000, true);
	add_image_size('rectangle-article', 1240, 9999, true);
	
	$myimgsizes = array(
		"square-thumbnail" => __("Square Thumbnail"),
		"square-small" => __("Square Small"),
		"square-medium" => __("Square Medium"),
		"square-large" => __("Square Large"),
		"rectangle-small" => __("Rectangle Small"),
		"rectangle-medium" => __("Rectangle Medium"),
		"rectangle-large" => __("Rectangle Large"),
		"rectangle-wide" => __("Rectangle Wide"),
		"rectangle-xl" => __("Rectangle XL"),
		"rectangle-article" => __("Article Image")
	);
	$newimgsizes = array_merge($sizes, $myimgsizes);
	
	return $newimgsizes;
}
add_filter('image_size_names_choose', 'custom_wmu_image_sizes');


/*
 * Creates a gallery display
*/
function wpboilerplate_gallery($sizes) {
	$gallery = get_field('wpboilerplate_gallery');
	$html = '';

	if ($images) {
		$html = '<div class="flexslider">';
		$html .= '<ul class="slides">';
		foreach($images as $image) {
			$html .= '<li>';
			$html .= '<img src="' . $image['sizes']['square-thumbnail'] . '" alt="' . $image['alt'] . '" />';
			$html .= '<p class="flex-caption">' . $image['caption'] . '</p>';
			// Try to get metadata for image - link
			// $html .= '<?php wp_get_attachment_metadata($attachment_id);
			$html .= '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
	}
	return $html;
}


/*
 * Returns CSS class for specified image size
*/
function wpboilerplate_get_image_class($imageSize) {
	
	if ($imageSize != "") {

		switch ($imageSize) {
		case "square-large":
		case "rectangle-large":
		case "rectangle-wide":
			$class = "twelve";
			break;
		case "rectangle-medium":
		case "square-medium":
			$class = "eight";
			break;
		case "rectangle-small":
			$class = "six";
			break;
		case "square-thumbnail":
			$class = "two";
			break;
		default:
			$class = "four";
		}
	
	} else {
		$class = "four";
	}
	
	return $class;
}


/*
 * Returns CSS class for specified image size
*/
function wpboilerplate_get_image_size_count($imageSize) {
	
	if ($imageSize != "") {

		switch ($imageSize) {
		case "square-large":
		case "rectangle-large":
		case "rectangle-wide":
			$count = 12;
			break;
		case "rectangle-medium":
		case "square-medium":
			$count = 8;
			break;
		case "rectangle-small":
			$count = 6;
			break;
		case "square-thumbnail":
			$count = 2;
			break;
		default:
			$count = 4;
		}
	
	} else {
		$count = 4;
	}
	
	return $count;
}


/*
 * Creates a size specifc image 
 * $size = Any image size shown above
function wpboilerplate_get_image($size = 'thumbnail-square') {
	$imageObj = get_field('feature_image', get_the_id());

	if ($imageObj != '') {
		$imageUrl = $imageObj[sizes][$size];
		$imageTitle = $imageObj[title];
		$imageHtml = '<img src="' . $imageUrl . '" alt="' . $imageTitle . '" />';
		return $imageHtml;
	} else {
		return;
	}
}
*/

/**
 * Adding our custom fields to the $form_fields array
 *
 * @param array $form_fields
 * @param object $post
 * @return array
 */
/*
function my_image_attachment_fields_to_edit($form_fields, $post) {
	// if you will be adding error messages for your field,
	// then in order to not overwrite them, as they are pre-attached
	// to this array, you would need to set the field up like this:
	$form_fields["custom1"]["label"] = __("Image Link");
	$form_fields["custom1"]["input"] = "html";
	$form_fields["custom1"]["html"] = get_posts_pages_select($post, 'custom1');
	$form_fields["custom1"]["value"] = get_post_meta($post->ID, "_custom1", true);
	return $form_fields;
}
// attach our function to the correct hook
add_filter("attachment_fields_to_edit", "my_image_attachment_fields_to_edit", null, 2);


/**
 * @param array $post
 * @param array $attachment
 * @return array
 */
/*
function my_image_attachment_fields_to_save($post, $attachment) {
	// $attachment part of the form $_POST ($_POST[attachments][postID])
	// $post attachments wp post array - will be saved after returned
	//     $post['post_type'] == 'attachment'
	if (isset($attachment['custom1'])){
		// update_post_meta(postID, meta_key, meta_value);
		update_post_meta($post['ID'], '_custom1', $attachment['custom1']);
	}
	return $post;
}
// attach our function to the correct hook
add_filter("attachment_fields_to_save", "my_image_attachment_fields_to_save", null, 2);


/**
 * Display image link
 *
 * Display the "Link" custom fields added to media attachments 
 *
 * Uses get_children() http://codex.wordpress.org/Function_Reference/get_children
 * Uses get_post_custom() http://codex.wordpress.org/Function_Reference/get_post_custom
 * @global $post The current post data
 * @return Prints the caption HTML
 */
/*
function base_image_credit($ID = null) {
	// Get the post ID of the current post if not set
	if (!$ID) {
		$ID = get_the_ID();
	}
 
	// Get all the attachments for the current post (object stdClass)
	$attachments = get_children('post_type=attachment&post_parent=' . $ID);
 
	// If attachments are found
	if (isset($attachments) && !empty($attachments)) {
		// Get the first attachment
		$first_attachment = current($attachments);
		$attachment_fields = get_post_custom( $first_attachment->ID );
 
		// Get custom attachment fields
		$credit_text = ( isset($attachment_fields['_credit_text'][0]) && !empty($attachment_fields['_credit_text'][0]) ) ? esc_attr($attachment_fields['_credit_text'][0]) : '';
		$credit_link = ( isset($attachment_fields['_credit_link'][0]) && !empty($attachment_fields['_credit_link'][0]) ) ? esc_url($attachment_fields['_credit_link'][0]) : '';
 
		// Output HTML if you want
		$credit = ( $credit_text && $credit_link ) ? "Image provided by <a href='$credit_link'>$credit_text</a>" : false;
	}
 
	return $credit;
}
*/

?>