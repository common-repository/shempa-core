<?php

/*-----------------------------------------------------------------------------------*/
/* Register a Custom Post Type (Project)
/*-----------------------------------------------------------------------------------*/
function project_init() {
	// Create The Labels (Output) For The Post Type
	$labels = array(
		// The plural form of the name of your post type.
		'name' => __( 'All Projects', 'cf-language'), 
		
		// The singular form of the name of your post type.
		'singular_name' => __('Project', 'cf-language'),
			
		// The menu item for adding a new post.
		'add_new' => _x('New Project', 'cf-language'),

		// The page title for adding a new post.
		'add_new_item' => __('Add New Project', 'cf-language'),
		
		// The header shown when editing a post.
		'edit_item' => __('Edit Project Item', 'cf-language'),
		
		// Shown in the favourites menu in the admin header.
		'new_item' => __('New Project Item', 'cf-language'), 
		
		// Shown alongside the permalink on the edit post screen.
		'view_item' => __('View Project', 'cf-language'),
		
		// Button text for the search box on the edit posts screen.
		'search_items' => __('Search Projects', 'cf-language'), 
		
		// Text to display when no posts are found through search in the admin.
		'not_found' =>  __('No Project Items Found', 'cf-language'),
		
		// Text to display when no posts are in the trash.
		'not_found_in_trash' => __('No Project Items Found In Trash', 'cf-language'),
		 
		 // NAme used in the Wordpress Admin Menu
		'menu_name' => __('Projects', 'cf-language'),
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

		//Enables post type archives
		'has_archive' => false,

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
	register_post_type(__( 'project' ), $args);
}

/*-----------------------------------------------------------------------------------*/
/* Post Type Messages
/*-----------------------------------------------------------------------------------*/
function project_messages($messages) {
	global $post, $post_ID;
	$messages['project'] = array(
		// Unused. Messages start at index 1
		0 => '',
		
		// Change the message once updated
		1 => sprintf(__('Project Updated. <a href="%s">View Projects</a>', 'cf-language'), esc_url(get_permalink($post_ID))),
		
		// Change the message if custom field has been updated
		2 => __('Custom Field Updated.', 'cf-language'),
		
		// Change the message if custom field has been deleted
		3 => __('Custom Field Deleted.', 'cf-language'),
		
		// Change the message once post has been updated
		4 => __('Project Updated.', 'cf-language'),
		
		// Change the message during revisions
		5 => isset($_GET['revision']) ? sprintf( __('Project Restored To Revision From %s', 'cf-language'), wp_post_revision_title((int)$_GET['revision'],false)) : false,
		
		// Change the message once published
		6 => sprintf(__('Project Published. <a href="%s">View Portfolio</a>', 'cf-language'), esc_url(get_permalink($post_ID))),
		
		// Change the message when saved
		7 => __('Project Saved.', 'cf-language'),
		
		// Change the message when submitted item
		8 => sprintf(__('Project Submitted. <a target="_blank" href="%s">Preview Portfolio</a>', 'cf-language'), esc_url( add_query_arg('preview','true',get_permalink($post_ID)))),
		
		// Change the message when a scheduled preview has been made
		9 => sprintf(__('Project Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Project</a>', 'cf-language'),date_i18n( __( 'M j, Y @ G:i' ),strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
		
		// Change the message when draft has been made
		10 => sprintf(__('Project Draft Updated. <a target="_blank" href="%s">Preview Project</a>', 'cf-language'), esc_url( add_query_arg('preview','true',get_permalink($post_ID)))),
	);
	return $messages;	
}

/*-----------------------------------------------------------------------------------*/
/* Post Type Taxonomy (filter)
/*-----------------------------------------------------------------------------------*/
function project_filter()
{
	// Register the Taxonomy
	register_taxonomy(__( "filter" ), 
	
	// Assign the taxonomy to be part of the portfolio post type
	array(__( "project" )), 
	
	// Apply the settings for the taxonomy
	array(
		"hierarchical" => true, 
		"label" => __( "Filter" ), 
		"singular_label" => __( "Filter" ), 
		"rewrite" => array(
				'slug' => 'filter', 
				'hierarchical' => true
				)
		)
	); 
}

add_action( 'init', 'project_init' );
add_filter( 'post_updated_messages', 'project_messages' );
add_action( 'init', 'project_filter', 0 );

?>