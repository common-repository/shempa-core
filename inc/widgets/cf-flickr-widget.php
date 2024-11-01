<?php
/*-----------------------------------------------------------------------------------*/
/* Widget that displays your Flickr uploads
/*-----------------------------------------------------------------------------------*/

class CF_Flickr_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'cf_flickr',
			'CF Flickr Widget',
			array('description' => __('Show your Flickr uploads.', 'cf-language'))
		); 
	}

	/**
	 * Render widget controls.
	 */
	public function form( $instance ) {
		$defaults = array(
			'title' => __( 'Flickr Stream', 'cf-language' ),
			'class' => 'flickr-items',
			'flickrID' => '65961696@N02',
			'postcount' => '3',
			'type' => 'user',
			'display' => 'latest'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		
		<!-- The Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'cf-language' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>		
		
		<!-- The CSS Class -->
		<p>
			<label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e( 'Name of CSS class:', 'cf-language' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" value="<?php echo esc_attr( $instance['class'] ); ?>" />
		</p>

		<!-- The Flickr ID -->
		<p>
			<label for="<?php echo $this->get_field_id( 'flickrID' ); ?>"><?php _e( 'Flickr ID: (see <a href="http://idgettr.com/">idGettr</a>)', 'cf-language' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'flickrID' ); ?>" name="<?php echo $this->get_field_name( 'flickrID' ); ?>" value="<?php echo esc_attr( $instance['flickrID'] ); ?>" />
		</p>
		
		<!-- The Number of images -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e( 'Number of photos:', 'cf-language' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" class="widefat">
				<option <?php if ( '1' == $instance['postcount'] ) echo 'selected="selected"'; ?>>1</option>
				<option <?php if ( '2' == $instance['postcount'] ) echo 'selected="selected"'; ?>>2</option>
				<option <?php if ( '3' == $instance['postcount'] ) echo 'selected="selected"'; ?>>3</option>
				<option <?php if ( '4' == $instance['postcount'] ) echo 'selected="selected"'; ?>>4</option>
				<option <?php if ( '5' == $instance['postcount'] ) echo 'selected="selected"'; ?>>5</option>
				<option <?php if ( '6' == $instance['postcount'] ) echo 'selected="selected"'; ?>>6</option>
				<option <?php if ( '7' == $instance['postcount'] ) echo 'selected="selected"'; ?>>7</option>
				<option <?php if ( '8' == $instance['postcount'] ) echo 'selected="selected"'; ?>>8</option>
				<option <?php if ( '9' == $instance['postcount'] ) echo 'selected="selected"'; ?>>9</option>
				<option <?php if ( '10' == $instance['postcount'] ) echo 'selected="selected"'; ?>>10</option>
			</select>		
		</p>
		
		<!-- The The Account Type -->
		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Type (user or group):', 'cf-language' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">	
				<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('user', 'cf-language' ); ?></option>
				<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('group', 'cf-language' ); ?></option>
			</select>
		</p>
		
		<!-- The Time -->
		<p>
			<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e( 'Show (random or most recent):', 'cf-language' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
				<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>><?php _e('random', 'cf-language' ); ?></option>
				<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>><?php _e('latest', 'cf-language' ); ?></option>
			</select>
		</p>

		<?php
	}

	/**
	 * Validate and update widget options.
	 */
	function update( $new_instance, $org_instance ) {
		$instance = $org_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['class'] = strip_tags( $new_instance['class'] );
		$instance['flickrID'] = strip_tags( $new_instance['flickrID'] );
		$instance['show'] = $new_instance['slide'];
		$instance['postcount'] = $new_instance['postcount'];
		$instance['type'] = $new_instance['type'];
		$instance['inline'] = $new_instance['true'];
		$instance['display'] = $new_instance['display'];

		return $instance;
	}

	/**
	 * Displays the widget contents.
	 */
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$class = $instance['class'];
		$flickrID = $instance['flickrID'];
		$postcount = $instance['postcount'];
		$type = $instance['type'];
		$display = $instance['display'];

		echo $before_widget;

		if ( $title ) echo $before_title . $title . $after_title;	
		echo '<div class="'. $class. '">'; ?>
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $postcount ?>&amp;display=<?php echo $display ?>&amp;size=s&amp;layout=v&amp;source=<?php echo $type ?>&amp;<?php echo $type ?>=<?php echo $flickrID ?>"></script>

		<?php echo '</div>';
		
		echo $after_widget;	
	}

}

/**
 * Register the widget.
 */
add_action( 'widgets_init', 'cf_flickr_widget_init' );
function cf_flickr_widget_init() {
	register_widget( 'CF_Flickr_Widget' );
}

?>