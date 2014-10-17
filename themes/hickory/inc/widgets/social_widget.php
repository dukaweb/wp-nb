<?php
/**
 * Plugin Name: Social Widget
 */

add_action( 'widgets_init', 'hickory_social_load_widget' );

function hickory_social_load_widget() {
	register_widget( 'hickory_social_widget' );
}

class hickory_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function hickory_social_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hickory_social_widget', 'description' => __('A widget that displays your social media profiles', 'hickory_social_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'hickory_social_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'hickory_social_widget', __('Hickory: Social', 'hickory_social_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$google = $instance['google'];
		$instagram = $instance['instagram'];
		$tumblr = $instance['tumblr'];
		$youtube = $instance['youtube'];
		$pinterest = $instance['pinterest'];
		$rss = $instance['rss'];
		$google_type = $instance['google_type'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
			if ( $title )
			echo $before_title . $title . $after_title;
		?>
		
		<div class="tabs-wrapper social_tabs">
		
			<ul class="tabs">
				<?php if($twitter) : ?><li><a href="#tab1" class="social twitter"></a></li><?php endif; ?>
				<?php if($facebook) : ?><li><a href="#tab2" class="social facebook"></a></li><?php endif; ?>
				<?php if($google) : ?><li><a href="#tab3" class="social google"></a></li><?php endif; ?>
				<?php if($instagram) : ?><li><a href="#tab4" class="social instagram"></a></li><?php endif; ?>
				<?php if($tumblr) : ?><li><a href="#tab5" class="social tumblr"></a></li><?php endif; ?>
				<?php if($youtube) : ?><li><a href="#tab6" class="social youtube"></a></li><?php endif; ?>
				<?php if($pinterest) : ?><li><a href="#tab7" class="social pinterest"></a></li><?php endif; ?>
				<?php if($rss) : ?><li><a href="#tab8" class="social rss"></a></li><?php endif; ?>
			</ul>
			
			<?php if($twitter) : ?>
			<div id="tab1" class="tab_content current_social">
			
				<a href="https://twitter.com/<?php echo hick_option('hick_twitter'); ?>" class="twitter-follow-button" data-show-count="true" data-dnt="true">Follow @<?php echo hick_option('hick_twitter'); ?></a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			
			</div>
			<?php endif; ?>
			
			<?php if($facebook) : ?>
			<div id="tab2" class="tab_content current_social">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo hick_option('hick_facebook'); ?>&amp;width=300&amp;height=62&amp;show_faces=false&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:62px;" allowTransparency="true"></iframe>
			</div>
			<?php endif; ?>
			
			<?php if($google) : ?>
			<div id="tab3" class="tab_content current_social">
			
				<!-- Place this tag where you want the widget to render. -->
				<div class="<?php if($google_type == 'page') : echo 'g-page'; else : echo 'g-person'; endif; ?>" data-href="https://plus.google.com/<?php echo hick_option('hick_google'); ?>" data-layout="landscape" data-width="273" data-rel="publisher"></div>
			
			</div>
			<?php endif; ?>
			
			<?php if($instagram) : ?>
			<div id="tab4" class="tab_content current_social">
			
				<a href="http://instagram.com/<?php echo hick_option('hick_instagram'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram-follow.png" alt="Follow on Instagram" /></a>
			
			</div>
			<?php endif; ?>
			
			<?php if($tumblr) : ?>
			<div id="tab5" class="tab_content current_social">
			
				<a href="http://<?php echo hick_option('hick_tumblr'); ?>.tumblr.com/"><img src="<?php echo get_template_directory_uri(); ?>/img/tumblr-follow.png" alt="Follow on Tumblr" /></a>
			
			</div>
			<?php endif; ?>
			
			<?php if($youtube) : ?>
			<div id="tab6" class="tab_content current_social">
			
				<div class="g-ytsubscribe" data-channel="<?php echo hick_option('hick_youtube'); ?>" data-layout="full"></div>
				
			</div>
			<?php endif; ?>
			
			<?php if($pinterest) : ?>
			<div id="tab7" class="tab_content current_social">
			
				<a data-pin-do="buttonFollow" href="http://pinterest.com/<?php echo hick_option('hick_pinterest'); ?>/">Follow <?php echo hick_option('hick_pinterest'); ?></a>
				
			</div>
			<?php endif; ?>
			
			<?php if($rss) : ?>
			<div id="tab8" class="tab_content current_social">
			
				<a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to our feed"><img src="<?php echo get_template_directory_uri(); ?>/img/rss-follow.png" alt="Follow on rss" /></a>
			
			</div>
			<?php endif; ?>
			
		</div>
			
		<?php

		/* After widget (defined by themes). */
		echo '</div>';
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = $new_instance['title'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['google'] = $new_instance['google'];
		$instance['instagram'] = $new_instance['instagram'];
		$instance['tumblr'] = $new_instance['tumblr'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['rss'] = $new_instance['rss'];
		$instance['google_type'] = $new_instance['google_type'];

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('Subscribe & Follow', 'hickory'), 'twitter' => 'on', 'facebook' => 'on', 'google' => 'on', 'instagram' => 'on',
			'tumblr' => false, 'youtube' => false, 'pinterest' => false, 'rss' => false
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Include Twitter:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" <?php checked( (bool) $instance['twitter'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Include Facebook:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" <?php checked( (bool) $instance['facebook'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'google' ); ?>">Include Google Plus:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>" <?php checked( (bool) $instance['google'], true ); ?> />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('google_type'); ?>">Google Plus type:</label> 
		<select id="<?php echo $this->get_field_id('google_type'); ?>" name="<?php echo $this->get_field_name('google_type'); ?>" style="width:100%;">
			<option <?php if ( 'person' == $instance['google_type'] ) : echo 'selected="selected"'; endif; ?>>person</option>
			<option <?php if ( 'page' == $instance['google_type'] ) : echo 'selected="selected"'; endif; ?>>page</option>
		</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>">Include Instagram:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" <?php checked( (bool) $instance['instagram'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>">Include Tumblr:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" <?php checked( (bool) $instance['tumblr'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>">Include Youtube:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" <?php checked( (bool) $instance['youtube'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>">Include Pinterest:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" <?php checked( (bool) $instance['pinterest'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">Include RSS:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" <?php checked( (bool) $instance['rss'], true ); ?> />
		</p>


	<?php
	}
}

?>