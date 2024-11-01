<?php
/*-----------------------------------------------------------------------------------*/
/* Widget that displays a Hero Unit based on text
/*-----------------------------------------------------------------------------------*/

class CF_Text_Hero_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'cf_txt_hero',
			'CF Text Hero Widget',
			array( 'description' => __('Hero Unit with text. Place it in the Hero Widget Area.', 'cf-language' ))
		); 
	}

	/**
	 * Render widget controls.
	 */
	public function form($instance) {
		$defaults = array(
			'large_heading' => '',
			'link_text' => '',
			'link_url' => '',
			'small_heading' => '',
			'page' => ''
		);
		
		$instance = wp_parse_args((array) $instance, $defaults);
		?>
		
		<!-- Large Heading -->
		<p>
			<label for="<?php echo $this->get_field_id('large_heading') ?>"><?php _e('Large Heading:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('large_heading'); ?>" name="<?php echo $this->get_field_name('large_heading'); ?>" value="<?php echo wp_kses_data( $instance['large_heading'] ); ?>" />
		</p>

		<!-- Link Text -->
		<p>
			<label for="<?php echo $this->get_field_id('link_text') ?>"><?php _e('Link Text:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('link_text'); ?>" name="<?php echo $this->get_field_name('link_text'); ?>" value="<?php echo esc_attr( $instance['link_text'] ); ?>" />
		</p>

		<!-- Link URL -->
		<p>
			<label for="<?php echo $this->get_field_id('link_url') ?>"><?php _e('Link URL:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('link_url'); ?>" name="<?php echo $this->get_field_name('link_url'); ?>" value="<?php echo $instance['link_url']; ?>" />
		</p>

		<!-- Small Heading -->
		<p>
			<label for="<?php echo $this->get_field_id('small_heading') ?>"><?php _e('Small Heading:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('small_heading'); ?>" name="<?php echo $this->get_field_name('small_heading'); ?>" value="<?php echo wp_kses_data( $instance['small_heading'] ); ?>" />
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
		
		$instance['large_heading'] = strip_tags( $new_instance['large_heading'] );
		$instance['link_text'] = strip_tags( $new_instance['link_text'] );
		$instance['link_url'] = strip_tags( $new_instance['link_url'] );
		$instance['small_heading'] = strip_tags( $new_instance['small_heading'] );
		$instance['page'] = $new_instance['page'];

		return $instance;
	}

	/**
	 * Displays the widget contents.
	 */
	public function widget($args, $instance) {
		extract($args);

		$large_heading = $instance['large_heading'];
		$link_text = $instance['link_text'];
		$link_url = $instance['link_url'];
		$small_heading = $instance['small_heading'];
		$page = $instance['page'];

		?>
		
		<?php if ( !empty( $page ) && is_page( $page ) ) { ?>
		<div class="cf-txt-hero-widget">
			<?php 
			if ($large_heading) { ?>
			<div class="container">
				<div class="row">
					<h1 class="col-lg-12"><?php echo wp_kses_data( $large_heading ); ?><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_text ); ?></a></h1>
				</div>
			</div>
			<?php } ?>

			<span class="section-separator"></span>
			
			<?php 
			if ($small_heading) { ?>
			<div class="small-heading">
				<div class="container">
					<div class="row">
						<h2 class="col-lg-12"><?php echo wp_kses_data( $small_heading ); ?></h2>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		
	<?php }

}

/**
 * Register the widget.
 */
add_action('widgets_init', 'cf_txt_hero_widget_init');
function cf_txt_hero_widget_init() {
	register_widget('CF_Text_Hero_Widget');
}

?>