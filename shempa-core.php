<?php

/*
Plugin Name: Shempa Core
Plugin URI: http://www.creativeflat.com
Description: Plugin that delivers core features for the Shempa Wordpress Theme
Version: 0.9.9.9
Author: Creative Flat
Author URI: http://www.creativeflat.com
*/


/*-----------------------------------------------------------------------------------*/
/* Executes at plugin activation
/*-----------------------------------------------------------------------------------*/
function shempa_core_activation() {

}
register_activation_hook(__FILE__, 'shempa_core_activation');


/*-----------------------------------------------------------------------------------*/
/* Executes at plugin deactivation
/*-----------------------------------------------------------------------------------*/
function shempa_core_deactivation() {

}
register_deactivation_hook(__FILE__, 'shempa_core_deactivation');


/*-----------------------------------------------------------------------------------*/
/* Load text domain for plugin translation
/*-----------------------------------------------------------------------------------*/
if (!function_exists('shempa_core_plugin_init')) {
	function shempa_core_plugin_init() {
		load_plugin_textdomain( 'cf-language', false, dirname( __FILE__ ) .'/languages/' );
	}
	add_action('init', 'shempa_core_plugin_init');
}


/*-----------------------------------------------------------------------------------*/
/* Include the Custom Post Types
/*-----------------------------------------------------------------------------------*/
require_once dirname( __FILE__ ) .'/inc/cpt/project-type.php';
require_once dirname( __FILE__ ) .'/inc/cpt/slide-type.php';


/*-----------------------------------------------------------------------------------*/
/* Include the Widgets
/*-----------------------------------------------------------------------------------*/
require_once dirname( __FILE__ ) .'/inc/widgets/cf-txt-hero-widget.php';
require_once dirname( __FILE__ ) .'/inc/widgets/cf-img-hero-widget.php';
require_once dirname( __FILE__ ) .'/inc/widgets/cf-latest-projects.php';
require_once dirname( __FILE__ ) .'/inc/widgets/cf-flickr-widget.php';
require_once dirname( __FILE__ ) .'/inc/widgets/cf-social-widget.php';


/*-----------------------------------------------------------------------------------*/
/* Include the Metabox Classes
/*-----------------------------------------------------------------------------------*/
require_once dirname( __FILE__ ) .'/assets/wpalchemy/MetaBox.php';
require_once dirname( __FILE__ ) .'/assets/wpalchemy/MediaAccess.php';
$wpalchemy_media_access = new WPAlchemy_MediaAccess();


/*-----------------------------------------------------------------------------------*/
/* Register the Meta Boxes
/*-----------------------------------------------------------------------------------*/
$common_metabox = $ccmb = new WPAlchemy_MetaBox(array(
	'id' => '_custom_meta_common',
	'title' => __('Intro and Extension Content', 'cf-language'),
	'template' => WP_PLUGIN_DIR . '/shempa-core/inc/metaboxes/common-meta.php',
	'types' => array('page'),
	'view' => WPALCHEMY_VIEW_START_OPENED,
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high' // same as above, defaults to "high"
));

$index_metabox = $imb = new WPAlchemy_MetaBox(array(
	'id' => '_custom_meta_box',
	'title' => __('Index Page Content', 'cf-language'),
	'template' => WP_PLUGIN_DIR . '/shempa-core/inc/metaboxes/index-meta.php',
	'types' => array('page'),
	'view' => WPALCHEMY_VIEW_START_OPENED,
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => array('front-page.php')
));

$about_metabox = $amb = new WPAlchemy_MetaBox(array(
	'id' => '_custom_meta_box',
	'title' => __('About Page Content', 'cf-language'),
	'template' => WP_PLUGIN_DIR . '/shempa-core/inc/metaboxes/about-meta.php',
	'types' => array('page'),
	'view' => WPALCHEMY_VIEW_START_OPENED,
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => array('page-about.php')
));

$services_metabox = $smb = new WPAlchemy_MetaBox(array(
	'id' => '_custom_meta_box',
	'title' => __('Services Page Content', 'cf-language'),
	'template' => WP_PLUGIN_DIR . '/shempa-core/inc/metaboxes/services-meta.php',
	'types' => array('page'),
	'view' => WPALCHEMY_VIEW_START_OPENED,
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => array('page-services.php')
));

$contact_metabox = $cntmb = new WPAlchemy_MetaBox(array(
	'id' => '_custom_meta_box',
	'title' => __('Contact Page Content', 'cf-language'),
	'template' => WP_PLUGIN_DIR . '/shempa-core/inc/metaboxes/contact-meta.php',
	'types' => array('page'),
	'view' => WPALCHEMY_VIEW_START_OPENED,
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => array('page-contact.php')
));


/*-----------------------------------------------------------------------------------*/
/* CSS style our custom meta boxes
/*-----------------------------------------------------------------------------------*/
if (!function_exists('shempa_core_load_custom_styles')) {
	function shempa_core_load_custom_styles() {
		wp_enqueue_style( 'metabox', plugins_url( '/inc/metaboxes/meta.css', __FILE__ ) );
	}
	add_action('init', 'shempa_core_load_custom_styles');
}

/*-----------------------------------------------------------------------------------*/
/* Include the scripts that will be used by the plugin
/*-----------------------------------------------------------------------------------*/
if (!function_exists('shempa_core_enqueue_admin_scripts')) {
	function shempa_core_enqueue_admin_scripts() {
		wp_enqueue_script('core-scripts', plugins_url('/js/core-scripts.js', __FILE__), 'jquery', false, true);
	}
	add_action( 'admin_enqueue_scripts', 'shempa_core_enqueue_admin_scripts' );
}


/*-----------------------------------------------------------------------------------*/
/* Add icons for the Custom Post Types
/*-----------------------------------------------------------------------------------*/
if (!function_exists('shempa_core_cpt_icons')) {
	add_action( 'admin_head', 'shempa_core_cpt_icons' );
	function shempa_core_cpt_icons() {
	    ?>
	    <style type="text/css" media="screen">
	        #menu-posts-project .wp-menu-image {
	            background: url(<?php echo plugins_url( 'inc/cpt/images/cf-project-type.png' , __FILE__ ); ?>) no-repeat 6px -17px !important;
	        }

	        #menu-posts-project:hover .wp-menu-image, #menu-posts-project.wp-has-current-submenu .wp-menu-image {
	            background-position:6px 7px!important;
	        }
	        
	        #icon-edit.icon32-posts-project {
				background: url(<?php echo plugins_url( 'inc/cpt/images/cf-project-type-edit.png' , __FILE__ ); ?>) no-repeat;
			}

	        #menu-posts-slide .wp-menu-image {
	            background: url(<?php echo plugins_url( 'inc/cpt/images/cf-slide-type.png' , __FILE__ ); ?>) no-repeat 6px -17px !important;
	        }

	        #menu-posts-slide:hover .wp-menu-image, #menu-posts-slide.wp-has-current-submenu .wp-menu-image {
	            background-position:6px 7px!important;
	        }

	        #icon-edit.icon32-posts-slide {
				background: url(<?php echo plugins_url( 'inc/cpt/images/cf-slide-type-edit.png' , __FILE__ ); ?>) no-repeat;
			}
	    </style>
	<?php } 
} 
?>