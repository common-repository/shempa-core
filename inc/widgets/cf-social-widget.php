<?php 
/*-----------------------------------------------------------------------------------*/
/* Widget that displays your social profiles
/*-----------------------------------------------------------------------------------*/

class CF_Social_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'cf_social',
			'CF Social Widget',
			array('description' => __('Show up to 10 social profiles', 'cf-language'))
		); 
	}

	/**
	 * Render widget controls.
	 */
	public function form($instance) {
		$defaults = array(
			'title' => __('Socialize with us', 'cf-language'),
			'desc' => '',
			'facebook_link' => 'http://www.facebook.com',
			'twitter_link' => 'http://www.twitter.com',
			'dribbble_link' => 'http://www.dribbble.com',
			'flickr_link' => 'http://www.flickr.com',
			'pinterest_link' => 'http://www.pinterest.com',
			'youtube_link' => 'http://www.youtube.com',
			'instagram_link' => 'http://www.instagram.com',
			'tumblr_link' => 'http://www.facebook.com',
			'linkedin_link' => 'http://www.linkedin.com',
			'googlep_link' => 'http://plus.google.com.com',
		);
		
		$instance = wp_parse_args((array) $instance, $defaults);
		?>

		<!-- The Title -->
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<!-- The Description -->
		<p>
			<label for="<?php echo $this->get_field_id('desc') ?>"><?php _e('Description:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>" value="<?php echo esc_attr( $instance['desc'] ); ?>" />
		</p>

		<!-- The Links -->
		<p>
			<label for="<?php echo $this->get_field_id('facebook_link') ?>"><?php _e('Facebook Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook_link'); ?>" name="<?php echo $this->get_field_name('facebook_link'); ?>" value="<?php echo esc_attr( $instance['facebook_link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('twitter_link') ?>"><?php _e('Twitter Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" value="<?php echo esc_attr( $instance['twitter_link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('dribbble_link') ?>"><?php _e('Dribbble Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('dribbble_link'); ?>" name="<?php echo $this->get_field_name('dribbble_link'); ?>" value="<?php echo esc_attr( $instance['dribbble_link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('flickr_link') ?>"><?php _e('Flickr Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('flickr_link'); ?>" name="<?php echo $this->get_field_name('flickr_link'); ?>" value="<?php echo esc_attr( $instance['flickr_link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('pinterest_link') ?>"><?php _e('Pinterest Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('pinterest_link'); ?>" name="<?php echo $this->get_field_name('pinterest_link'); ?>" value="<?php echo esc_attr( $instance['pinterest_link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('youtube_link') ?>"><?php _e('Youtube Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('youtube_link'); ?>" name="<?php echo $this->get_field_name('youtube_link'); ?>" value="<?php echo esc_attr( $instance['youtube_link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('instagram_link') ?>"><?php _e('Instagram Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram_link'); ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" value="<?php echo esc_attr( $instance['instagram_link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('tumblr_link') ?>"><?php _e('Tumblr Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('tumblr_link'); ?>" name="<?php echo $this->get_field_name('tumblr_link'); ?>" value="<?php echo esc_attr( $instance['tumblr_link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('linkedin_link') ?>"><?php _e('Linkedin Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin_link'); ?>" name="<?php echo $this->get_field_name('linkedin_link'); ?>" value="<?php echo esc_attr( $instance['linkedin_link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('googlep_link') ?>"><?php _e('Google Plus Link:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('googlep_link'); ?>" name="<?php echo $this->get_field_name('googlep_link'); ?>" value="<?php echo esc_attr( $instance['googlep_link'] ); ?>" />
		</p>
		
		<?php
	}
	
	/**
	 * Validate and update widget options.
	 */
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['desc'] = strip_tags( $new_instance['desc'] );
		$instance['facebook_link'] = strip_tags ( $new_instance['facebook_link'] );
		$instance['twitter_link'] = strip_tags ( $new_instance['twitter_link'] );
		$instance['dribbble_link'] = strip_tags ( $new_instance['dribbble_link'] );
		$instance['flickr_link'] = strip_tags ( $new_instance['flickr_link'] );
		$instance['pinterest_link'] = strip_tags ( $new_instance['pinterest_link'] );
		$instance['youtube_link'] = strip_tags ( $new_instance['youtube_link'] );
		$instance['instagram_link'] = strip_tags ( $new_instance['instagram_link'] );
		$instance['tumblr_link'] = strip_tags ( $new_instance['tumblr_link'] );
		$instance['linkedin_link'] = strip_tags ( $new_instance['linkedin_link'] );
		$instance['googlep_link'] = strip_tags ( $new_instance['googlep_link'] );

		return $instance;
	}
	
	/**
	 * Displays the widget contents.
	 */
	public function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);
		$desc = $instance['desc'];
		$facebook_link = $instance['facebook_link'];
		$twitter_link = $instance['twitter_link'];
		$dribbble_link = $instance['dribbble_link'];
		$flickr_link = $instance['flickr_link'];
		$pinterest_link = $instance['pinterest_link'];
		$youtube_link = $instance['youtube_link'];
		$instagram_link = $instance['instagram_link'];
		$tumblr_link = $instance['tumblr_link'];
		$linkedin_link = $instance['linkedin_link'];
		$googlep_link = $instance['googlep_link'];
		
		echo $before_widget;
		
		if ( $title ) { ?>
			<?php echo $before_title . $title . $after_title; ?>
			<?php if ( $desc ) { ?>
			<p class="desc"><?php echo $desc; ?></p>
			<?php } ?>
			<ul>
				<?php if ( $facebook_link ) { ?>
				<li><a href="<?php echo $facebook_link; ?>"><i class="icon-facebook icon"></i></a></li>
				<?php } ?>
				<?php if ( $twitter_link ) { ?>
				<li><a href="<?php echo $twitter_link; ?>"><i class="icon-twitter icon"></i></a></li>
				<?php } ?>
				<?php if ( $dribbble_link ) { ?>
				<li><a href="<?php echo $dribbble_link; ?>"><i class="icon-dribbble icon"></i></a></li>
				<?php } ?>
				<?php if ( $flickr_link ) { ?>
				<li><a href="<?php echo $flickr_link; ?>"><i class="icon-flickr icon"></i></a></li>
				<?php } ?>
				<?php if ( $pinterest_link ) { ?>
				<li><a href="<?php echo $pinterest_link; ?>"><i class="icon-pinterest icon"></i></a></li>
				<?php } ?>
				<?php if ( $youtube_link ) { ?>
				<li><a href="<?php echo $youtube_link; ?>"><i class="icon-youtube-play icon"></i></a></li>
				<?php } ?>
				<?php if ( $instagram_link ) { ?>
				<li><a href="<?php echo $instagram_link; ?>"><i class="icon-instagram icon"></i></a></li>
				<?php } ?>
				<?php if ( $tumblr_link ) { ?>
				<li><a href="<?php echo $tumblr_link; ?>"><i class="icon-tumblr icon"></i></a></li>
				<?php } ?>
				<?php if ( $linkedin_link ) { ?>
				<li><a href="<?php echo $linkedin_link; ?>"><i class="icon-linkedin icon"></i></a></li>
				<?php } ?>
				<?php if ( $googlep_link ) { ?>
				<li><a href="<?php echo $googlep_link; ?>"><i class="icon-google-plus icon"></i></a></li>
				<?php } ?>
			</ul>
		<?php }
		
		echo $after_widget; 
	}
}

/**
 * Register the widget.
 */
add_action( 'widgets_init', 'cf_social_widget_init' );
function cf_social_widget_init() {
	register_widget( 'CF_Social_Widget' );
}

?>