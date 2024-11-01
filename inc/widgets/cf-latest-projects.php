<?php
/*-----------------------------------------------------------------------------------*/
/* Widget that displays the Latest Projects (from Project custom post type)
/*-----------------------------------------------------------------------------------*/

class CF_Latest_Projects_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'cf_latest_projects',
			'CF Latest Projects Widget',
			array( 'description' => __('Display the Latest Projects (from Project custom post type)', 'cf-language') )
		);
	}

	/**
	 * Render widget controls.
	 */
	public function form($instance) {
		$defaults = array(
			'title' => 'Latest Projects',
			'num_projects' => '2',
			'desc' => ''
		);
		
		$instance = wp_parse_args((array) $instance, $defaults);
		?>
		
		<!-- The Title -->
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo wp_kses_data( $instance['title'] ); ?>" />
		</p>

		<!-- Number of Projects -->
		<p>
			<label for="<?php echo $this->get_field_id('num_projects') ?>"><?php _e('Number of Projects:', 'cf-language'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('num_projects'); ?>" name="<?php echo $this->get_field_name('num_projects'); ?>" value="<?php echo esc_attr( $instance['num_projects'] ); ?>" />
		</p>

		<!-- Description -->
		<p>
			<label for="<?php echo $this->get_field_id('desc') ?>"><?php _e('Description:', 'cf-language'); ?></label>
			<input type="textarea" class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>" value="<?php echo esc_attr( $instance['desc'] ); ?>" />
		</p>
		
		<?php
	}

	/**
	 * Validate and update widget options.
	 */
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_projects'] = absint( $new_instance['num_projects'] );
		$instance['desc'] = strip_tags( $new_instance['desc'] );

		return $instance;
	}

	/**
	 * Displays the widget contents.
	 */
	public function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);
		$num_projects = $instance['num_projects'];
		$desc = $instance['desc'];
		
		echo $before_widget;
		
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		if ( $desc ) { ?>
			<p class="desc"><?php echo $desc; ?></p>
		<?php }

		// Setup the query to get the Portfolio items
		$args = array ( 'post_type' => 'project', 'numberposts' => $num_projects, 'meta_key' => '_thumbnail_id' );
		$recent_projects = get_posts( $args );

		?>

		<div id="cf-latest-projects-widget-carousel-<?php the_ID(); ?>" class="carousel slide">
			<?php
			if ( $recent_projects ) { ?>
				<ol class="carousel-indicators">
					<?php $i = 0; foreach ($recent_projects as $project) { ?>
						<?php if ($i == 0) { ?>
							<li data-target="#cf-latest-projects-widget-carousel-<?php the_ID(); ?>" data-slide-to="<?php echo $i; ?>" class="active"></li>
						<?php } else { ?>
							<li data-target="#cf-latest-projects-widget-carousel-<?php the_ID(); ?>" data-slide-to="<?php echo $i; ?>"></li>
						<?php } ?>
						<?php $i++; ?>
					<?php } ?>
				</ol>
				<div class="carousel-inner">
					<?php $j = 0; foreach ($recent_projects as $project) { ?>
						<?php if ($j == 0) { ?>
							<div class="item active">
								<?php echo get_the_post_thumbnail($project->ID, 'portfolio', false); ?>
								<div class="carousel-caption">
									<a href="<?php echo post_permalink( $project->ID ); ?>"><?php echo $project->post_title; ?></a>
								</div>
							</div>
						<?php } else { ?>
							<div class="item">
								<?php echo get_the_post_thumbnail($project->ID, 'portfolio', false); ?>
								<div class="carousel-caption">
									<a href="<?php echo post_permalink( $project->ID ); ?>"><?php echo $project->post_title; ?></a>
								</div>
							</div>
						<?php } ?>
						<?php $j++; ?>
					<?php } ?>
				</div>
			<?php } ?>

			<a class="carousel-control left" href="#cf-latest-projects-widget-carousel-<?php the_ID(); ?>" data-slide="prev"><span class="icon-prev"></span></a>
			<a class="carousel-control right" href="#cf-latest-projects-widget-carousel-<?php the_ID(); ?>" data-slide="next"><span class="icon-next"></span></i></a>
		</div>
		
		
		<?php
		echo $after_widget; 
		
	}

}

/**
 * Register the widget.
 */
add_action('widgets_init', 'cf_latest_projects_widget_init');
function cf_latest_projects_widget_init() {
	register_widget('CF_Latest_Projects_Widget');
}

?>