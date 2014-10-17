<?php
/**
 * Plugin Name: Homepage Ad
 */

add_action( 'widgets_init', 'hickory_homepage_ad_load_widget' );

function hickory_homepage_ad_load_widget() {
	register_widget( 'hickory_homepage_ad_widget' );
}

class hickory_homepage_ad_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function hickory_homepage_ad_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hickory_homepage_ad_widget', 'description' => __('A widget used for the homepage to display advertisement', 'hickory_homepage_ad_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'hickory_homepage_ad_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'hickory_homepage_ad_widget', __('Hickory: Homepage Ad', 'hickory_homepage_ad_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$bannercode = $instance['bannercode'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		?>
		
			<?php if($title) : ?><h2 class="content-heading"><?php echo $title; ?></h2><?php endif; ?>
			
			<div class="widget-ad">
				<?php echo $bannercode; ?>
			</div>
			
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['bannercode'] = $new_instance['bannercode'];

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('', 'hickory'), 'bannercode' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('bannercode'); ?>">Ad code:</label> 
		<textarea class='widefat' id='<?php echo $this->get_field_id('bannercode'); ?>' name='<?php echo $this->get_field_name('bannercode'); ?>' rows='15'><?php echo $instance['bannercode']; ?></textarea>
		</p>


	<?php
	}
}

?>