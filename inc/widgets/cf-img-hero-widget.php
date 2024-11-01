<?php
/*-----------------------------------------------------------------------------------*/
/* Widget that displays a Hero Unit with an image background
/*-----------------------------------------------------------------------------------*/

class CF_Image_Hero_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'cf_img_hero',
			'CF Image Hero Widget',
			array( 'description' => __('Hero Unit with an image background. Place it in the Hero Widget Area.', 'cf-language') )
		); 
	}

	/**
	 * Render widget controls.
	 */
	public function form($instance) {
		$defaults = array(
			'icon' => '',
			'title' => '',
			'desc' => '',
			'link1_text' => '',
			'link1_url' => '',
			'link2_text' => '',
			'link2_url' => '',
			'bg_img' => '',
			'page' => ''
		);
		
		$instance = wp_parse_args((array) $instance, $defaults);
		?>
		
		<!-- The Title -->
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo wp_kses_data( $instance['title'] ); ?>" />
		</p>

		<!-- The Icon -->
		<p>
			<label for="<?php echo $this->get_field_id('icon') ?>"><?php _e('Icon:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" value="<?php echo esc_attr( $instance['icon'] ); ?>" />
		</p>

		<!-- Description -->
		<p>
			<label for="<?php echo $this->get_field_id('desc') ?>"><?php _e('Description:', 'cf-language'); ?></label>
			<input type="textarea" class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>" value="<?php echo esc_attr( $instance['desc'] ); ?>" />
		</p>

		<!-- Links -->
		<p>
			<label for="<?php echo $this->get_field_id('link1_text') ?>"><?php _e('Button 1 Text:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('link1_text'); ?>" name="<?php echo $this->get_field_name('link1_text'); ?>" value="<?php echo esc_attr( $instance['link1_text'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link1_url') ?>"><?php _e('Button 1 URL:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('link1_url'); ?>" name="<?php echo $this->get_field_name('link1_url'); ?>" value="<?php echo esc_attr( $instance['link1_url'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link2_text') ?>"><?php _e('Button 2 Text:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('link2_text'); ?>" name="<?php echo $this->get_field_name('link2_text'); ?>" value="<?php echo esc_attr( $instance['link2_text'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link2_url') ?>"><?php _e('Button 2 URL:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('link2_url'); ?>" name="<?php echo $this->get_field_name('link2_url'); ?>" value="<?php echo esc_attr( $instance['link2_url'] ); ?>" />
		</p>

		<!-- Background Image -->
		<p>
		  <label for="<?php echo $this->get_field_id('bg_img'); ?>">Background Image</label><br />
		  <input type="text" class="img" name="<?php echo $this->get_field_name('bg_img'); ?>" id="<?php echo $this->get_field_id('bg_img'); ?>" value="<?php echo $instance['bg_img']; ?>" />
		  <input type="button" class="select-img" value="Select Image" />
		</p>
		
		<!-- Page -->
		<p>
			<label for="<?php echo $this->get_field_id('page') ?>"><?php _e('Page:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('page'); ?>" name="<?php echo $this->get_field_name('page'); ?>" value="<?php echo esc_attr( $instance['page'] ); ?>" />
		</p>
		
		<?php
	}

	/**
	 * Validate and update widget options.
	 */
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['icon'] = strip_tags( $new_instance['icon'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['desc'] = strip_tags( $new_instance['desc'] );
		$instance['link1_text'] = strip_tags( $new_instance['link1_text'] );
		$instance['link1_url'] = strip_tags( $new_instance['link1_url'] );
		$instance['link2_text'] = strip_tags( $new_instance['link2_text'] );
		$instance['link2_url'] = strip_tags( $new_instance['link2_url'] );
		$instance['bg_img'] = $new_instance['bg_img'];
		$instance['page'] = $new_instance['page'];

		return $instance;
	}

	/**
	 * Displays the widget contents.
	 */
	public function widget($args, $instance) {
		extract($args);

		$icon = $instance['icon'];
		$title = apply_filters('widget_title', $instance['title']);
		$desc = $instance['desc'];
		$link1_text = $instance['link1_text'];
		$link1_url = $instance['link1_url'];
		$link2_text = $instance['link2_text'];
		$link2_url = $instance['link2_url'];
		$bg_img = $instance['bg_img'];
		$page = $instance['page'];
		
		if ( !empty( $page ) && is_page( $page ) ) {
			if ( !empty($bg_img) ) { ?>
				<div class="cf-img-hero-widget" style="background-image: url(<?php echo esc_url( $bg_img ); ?>);">
			<?php } else { ?>
				<div class="cf-img-hero-widget">
			<?php } ?>
					<div class="container">
						<div class="row">
							<?php 
							if ($icon) { ?>
								<div class="hero-icon fade-in-slide-down">
									<i class="<?php echo esc_html( $icon ); ?> icon"></i>
								</div>
							<?php }
							
							if ($title) { ?>
								<h1 class="fade-in-slide-down"><?php echo esc_html( $title ); ?></h1>
							<?php }

							if ($desc) { ?>
								<p class="desc fade-in-slide-up"><?php echo esc_html( $desc ); ?></p>
								<span class="clearfix"></span>
							<?php }

							if ($link1_text) { ?>
								<a href="<?php echo esc_url( $link1_url ); ?>" class="btn btn-primary fade-in-slide-up" ><?php echo esc_html( $link1_text ); ?></a>
							<?php }

							if ($link2_text) { ?>
								<a href="<?php echo esc_url( $link2_url ); ?>" class="btn btn-primary fade-in-slide-up"><?php echo esc_html( $link2_text ); ?></a>
							<?php } ?>
						</div>
					</div>
				</div>
		<?php } ?>
		
	<?php }

}

/**
 * Register the widget.
 */
add_action('widgets_init', 'cf_img_hero_widget_init');
function cf_img_hero_widget_init() {
	register_widget('CF_Image_Hero_Widget');
}

/**
 * Enqueue scripts and styles for the Wordpress Uploader
 */
function hero_enqueue() {
	wp_enqueue_style('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}
add_action('admin_enqueue_scripts', 'hero_enqueue');

?>