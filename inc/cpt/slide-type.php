<?php

/*-----------------------------------------------------------------------------------*/
/* Register a Custom Post Type (Slide)
/*-----------------------------------------------------------------------------------*/
function slide_init() {
	// Create The Labels (Output) For The Post Type
	$labels = array(
		// The plural form of the name of your post type.
		'name' => __('All Slides', 'cf-language'),

		// The singular form of the name of your post type.
		'singular_name' => __('Slide', 'cf-language'),

		// The menu item for adding a new post.
		'add_new' => __('New Slide', 'cf-language'),

		// The page title for adding a new post.
		'add_new_item' => __('Add New Slide', 'cf-language'),

		// The header shown when editing a post.
		'edit_item' => __('Edit Slide', 'cf-language'),

		// Shown in the favourites menu in the admin header.
		'new_item' => __('New Slide', 'cf-language'),

		// Shown alongside the permalink on the edit post screen.
		'view_item' => __('View Slide', 'cf-language'),

		// Button text for the search box on the edit posts screen.
		'search_items' => __('Search Slides', 'cf-language'),

		// Text to display when no posts are found through search in the admin.
		'not_found' => __('No slides found', 'cf-language'),

		// Text to display when no posts are in the trash.
		'not_found_in_trash' => __('No slides found in Trash', 'cf-language'), 

		// NAme used in the Wordpress Admin Menu
		'menu_name' => __('Slides', 'cf-language'),
	);

	// Set Up The Arguements
	$args = array(
		// Pass The Array Of Labels from above
		'labels' => $labels,

		// Display The Post Type To Admin
		'public' => true,

		// Allow Post Type To Be Queried 
		'publicly_queryable' => true,

		// Build a UI for the Post Type
		'show_ui' => true, 

		// Whether post type is available for selection in navigation menus. 
		'show_in_menu' => true,

		// Use String for Query Post Type
		'query_var' => true,

		// Enables post type archives
		'has_archive' => true,

		//Rewrites the slug of the post type
		'rewrite' => array(  
			'slug' => 'portfolio-item',  
		),

		// Set type to construct arguements
		'capability_type' => 'post',

		// Disable Hierachical - No Parent
		'hierarchical' => false,

		// Set Menu Position for where it displays in the navigation bar
		'menu_position' => null,

		// Items of this type will not appear in search results
		'exclude_from_search' => true,

		// Allow the portfolio to support a Title, Editor, Thumbnail
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);

	// Register The Post Type
	register_post_type('slide', $args);
}

/*-----------------------------------------------------------------------------------*/
/* Post Type Messages
/*-----------------------------------------------------------------------------------*/
function slide_messages($messages) {
	global $post, $post_ID;
	$messages['slide'] = array(
		// Unused. Messages start at index 1
		0 => '',

		// Change the message once updated
		1 => sprintf(__('Slide updated.', 'cf-language'), esc_url(get_permalink($post_ID))),

		// Change the message if custom field has been updated
		2 => __('Custom field updated.', 'cf-language'),

		// Change the message if custom field has been deleted
		3 => __('Custom field deleted.', 'cf-language'),

		// Change the message once post has been updated
		4 => __('Slide updated.', 'cf-language'),

		// Change the message during revisions
		5 => isset($_GET['revision']) ? sprintf(__('Slide restored to revision from %s', 'cf-language'), wp_post_revision_title((int) $_GET['revision'], false)) : false,

		// Change the message once published
		6 => sprintf(__('Slide published.', 'cf-language'), esc_url(get_permalink($post_ID))),

		// Change the message when saved
		7 => __('Slide saved.', 'cf-language'),

		// Change the message when submitted item
		8 => sprintf(__('Slide submitted.', 'cf-language'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),

		// Change the message when a scheduled preview has been made
		9 => sprintf(__('Slide scheduled for: <strong>%1$s</strong>. ', 'cf-language'), date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),

		// Change the message when draft has been made
		10 => sprintf(__('Slide draft updated.', 'cf-language'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
	);
	return $messages;
}

add_action('init', 'slide_init');
add_filter('post_updated_messages', 'slide_messages');

?>