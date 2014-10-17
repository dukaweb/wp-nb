<?php
/**
 * Plugin Name: Homepage Slider Widget
 */

add_action( 'widgets_init', 'hickory_homepage_slider_load_widget' );

function hickory_homepage_slider_load_widget() {
	register_widget( 'hickory_homepage_slider_widget' );
}

class hickory_homepage_slider_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function hickory_homepage_slider_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hickory_homepage_slider_widget', 'description' => __('A widget used for the homepage or pages/categories to display a slider', 'hickory_homepage_slider_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'hickory_homepage_slider_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'hickory_homepage_slider_widget', __('Hickory: Homepage Slider Widget', 'hickory_homepage_slider_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$slider_type = $instance['slider_type'];
		$categories = (array) $instance['categories'];
		$sortby = $instance['sortby'];
		$exclude = $instance['exclude'];
		$custom_url = $instance['custom_url'];
		$custom_url_text = $instance['custom_url_text'];
		
		if($exclude) :
			$exclude_posts = hick_exclude_posts($exclude);
		endif;
		
		if($sortby == 'latest') :
			$query = array('showposts' => 5, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'post__not_in' => $exclude_posts);
		elseif($sortby == 'featured') :
			$query = array('showposts' => 5, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'is_featured', 'meta_value' => 1);
		else :
			$query = array('showposts' => 5, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'post__not_in' => $exclude_posts);
		endif;
		
		if( ! in_array( 'all', $categories ) )
		{
			$query['cat'] = implode(',', $categories);
		}
		
		$loop = new WP_Query($query);
		if ($loop->have_posts()) :
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		?>
		
			<?php if($title) : ?><h2 class="content-heading"><?php echo $title; ?><?php if($custom_url) : ?><a href="<?php echo $custom_url; ?>" class="widget-link"><?php echo $custom_url_text; ?></a><?php endif; ?></h2><?php endif; ?>
			
			<div class="widget_slider<?php if($slider_type == 'short') { echo ' short'; } ?>">
			
				<div class="flexslider homepage<?php if($slider_type == 'short') : ?> short-slider<?php else : ?> main-slider<?php endif; ?>">
					<ul class="slides">
						
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
							
						<li>
							
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
									<?php if($slider_type == 'short') : ?>
										<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() )) : ?>
										<?php $feat_image = vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() ); ?>
										<a href="<?php echo get_permalink() ?>" rel="bookmark"><img src="<?php echo aq_resize($feat_image,940,240,true,true,true); ?>" /></a>
										<?php else : ?>
										<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
										<a href="<?php echo get_permalink() ?>" rel="bookmark"><img src="<?php echo aq_resize($feat_image,940,240,true,true,true); ?>" /></a>
										<?php endif; ?>
									<?php else :?>
										<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() )) : ?>
										<?php $feat_image = vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() ); ?>
										<a href="<?php echo get_permalink() ?>" rel="bookmark"><img src="<?php echo aq_resize($feat_image,940,520,true,true,true); ?>" /></a>
										<?php else : ?>
										<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
										<a href="<?php echo get_permalink() ?>" rel="bookmark"><img src="<?php echo aq_resize($feat_image,940,520,true,true,true); ?>" /></a>
										<?php endif; ?>
									<?php endif; ?>
								<?php else : ?>
									<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/default_slider_img.png" alt="<?php the_title(); ?>" /></a>
								<?php endif; ?>
							
							<div class="feature_text">
								<span class="category">
								<?php 
									$category = get_the_category(get_the_ID()); 
									if($category[0]){
										echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
									}
								?>
								</span>
								<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_title', false, get_the_ID() )) : ?>
								<h2><a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><?php echo vp_metabox( 'hickory_post.featured_data.0.custom_title', false, get_the_ID() ); ?></a></h2>
								<?php else : ?>
								<h2><a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><?php echo get_the_title(get_the_ID()); ?></a></h2>
								<?php endif; ?>
							</div>
							<div class="feature_overlay"></div>
						</li>
							
						<?php endwhile; ?>
						<?php endif; ?>

					</ul>
				</div>
				
			</div>
		<?php

		/* After */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['slider_type'] = $new_instance['slider_type'];
		$instance['categories'] = $new_instance['categories'];
		$instance['sortby'] = $new_instance['sortby'];
		$instance['exclude'] = $new_instance['exclude'];
		$instance['custom_url'] = $new_instance['custom_url'];
		$instance['custom_url_text'] = $new_instance['custom_url_text'];

		return $instance;
	}


	function form( $instance ) {
		$instance['categories'] = (array) $instance['categories'];
		/* Set up some default widget settings. */
		$defaults = array( 'title' => '', 'slider_type' => 'normal', 'categories' => array('all'), 'sortby' => 'latest');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('slider_type'); ?>">Slider Type:</label> 
		<select id="<?php echo $this->get_field_id('slider_type'); ?>" name="<?php echo $this->get_field_name('slider_type'); ?>" style="width:100%;">
			<option <?php if ( 'normal' == $instance['slider_type'] ) : echo 'selected="selected"'; endif; ?>>normal</option>
			<option <?php if ( 'short' == $instance['slider_type'] ) : echo 'selected="selected"'; endif; ?>>short</option>
		</select>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label> 
		<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>[]" class="widefat categories" style="width:100%;height:100px;" multiple="multiple">
			<option value='all' <?php if( in_array( 'all', $instance['categories'] ) !== FALSE ) { ?>selected="selected"<?php } ?>>All categories</option>
			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
			<?php foreach($categories as $category) { ?>
			<option value='<?php echo $category->term_id; ?>' <?php if( in_array( $category->term_id, $instance['categories'] ) !== FALSE ) { ?>selected="selected"<?php } ?>><?php echo $category->cat_name; ?></option>
			<?php } ?>
		</select>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('sortby'); ?>">Sort By:</label> 
		<select id="<?php echo $this->get_field_id('sortby'); ?>" name="<?php echo $this->get_field_name('sortby'); ?>" style="width:100%;">
			<option <?php if ( 'latest' == $instance['sortby'] ) : echo 'selected="selected"'; endif; ?>>latest</option>
			<option <?php if ( 'featured' == $instance['sortby'] ) : echo 'selected="selected"'; endif; ?>>featured</option>
		</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'exclude' ); ?>">Exclude Featured Posts:</label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'exclude' ); ?>" name="<?php echo $this->get_field_name( 'exclude' ); ?>" <?php checked( (bool) $instance['exclude'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'custom_url' ); ?>"><?php _e('Custom URL:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'custom_url' ); ?>" name="<?php echo $this->get_field_name( 'custom_url' ); ?>" value="<?php echo $instance['custom_url']; ?>"  />
			<small>Note: Link will appear to the right of the widget title.</small>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'custom_url_text' ); ?>"><?php _e('Custom URL Text:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'custom_url_text' ); ?>" name="<?php echo $this->get_field_name( 'custom_url_text' ); ?>" value="<?php echo $instance['custom_url_text']; ?>"  />
		</p>

	<?php
	}
}

?>