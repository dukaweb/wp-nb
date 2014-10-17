<?php
/**
 * Plugin Name: Homepage 3 Column Widget
 */

add_action( 'widgets_init', 'hickory_homepage_3col_load_widget' );

function hickory_homepage_3col_load_widget() {
	register_widget( 'hickory_homepage_3col_widget' );
}

class hickory_homepage_3col_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function hickory_homepage_3col_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hickory_homepage_3col_widget', 'description' => __('A widget used for the homepage or pages/categories to display 3 columns with different post layouts', 'hickory_homepage_3col_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'hickory_homepage_3col_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'hickory_homepage_3col_widget', __('Hickory: Homepage 3 Column Post Widget', 'hickory_homepage_3col_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = (array) $instance['categories'];
		$post_type = $instance['post_type'];
		$moreposts = $instance['moreposts'];
		$exclude = $instance['exclude'];
		$custom_url = $instance['custom_url'];
		$custom_url_text = $instance['custom_url_text'];
		
		if($exclude) :
			$exclude_posts = hick_exclude_posts($exclude);
		endif;
		
		if($post_type == 'all') :
			$query = array('showposts' => 1, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'post__not_in' => $exclude_posts);
			$query2 = array('showposts' => 2, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'offset' => 1, 'post__not_in' => $exclude_posts);
			$query3 = array('showposts' => $moreposts, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'offset' => 3, 'post__not_in' => $exclude_posts);
		elseif($post_type == 'regular') :
			$query = array('showposts' => 1, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'regular', 'post__not_in' => $exclude_posts);
			$query2 = array('showposts' => 2, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'regular', 'offset' => 1, 'post__not_in' => $exclude_posts);
			$query3 = array('showposts' => $moreposts, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'regular', 'offset' => 3, 'post__not_in' => $exclude_posts);
		elseif($post_type == 'video') :
			$query = array('showposts' => 1, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'video', 'post__not_in' => $exclude_posts);
			$query2 = array('showposts' => 2, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'video', 'offset' => 1, 'post__not_in' => $exclude_posts);
			$query3 = array('showposts' => $moreposts, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'video', 'offset' => 3, 'post__not_in' => $exclude_posts);
		elseif($post_type == 'gallery') :
			$query = array('showposts' => 1, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'gallery', 'post__not_in' => $exclude_posts);
			$query2 = array('showposts' => 2, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'gallery', 'offset' => 1, 'post__not_in' => $exclude_posts);
			$query3 = array('showposts' => $moreposts, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'gallery', 'offset' => 3, 'post__not_in' => $exclude_posts);
		elseif($post_type == 'review') :
			$query = array('showposts' => 1, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'review', 'post__not_in' => $exclude_posts);
			$query2 = array('showposts' => 2, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'review', 'offset' => 1, 'post__not_in' => $exclude_posts);
			$query3 = array('showposts' => $moreposts, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'review', 'offset' => 3, 'post__not_in' => $exclude_posts);
		elseif($post_type == 'music') :
			$query = array('showposts' => 1, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'music', 'post__not_in' => $exclude_posts);
			$query2 = array('showposts' => 2, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'music', 'offset' => 1, 'post__not_in' => $exclude_posts);
			$query3 = array('showposts' => $moreposts, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => 'music', 'offset' => 3, 'post__not_in' => $exclude_posts);
		else :
			$query = array('showposts' => 1, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'post__not_in' => $exclude_posts);
			$query2 = array('showposts' => 2, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'offset' => 1, 'post__not_in' => $exclude_posts);
			$query3 = array('showposts' => $moreposts, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'offset' => 3, 'post__not_in' => $exclude_posts);
		endif;
		
		if( ! in_array( 'all', $categories ) )
		{
			$query['cat'] = implode(',', $categories);
		}
		if( ! in_array( 'all', $categories ) )
		{
			$query2['cat'] = implode(',', $categories);
		}
		if( ! in_array( 'all', $categories ) )
		{
			$query3['cat'] = implode(',', $categories);
		}
		
		$loop = new WP_Query($query);
		$loop2 = new WP_Query($query2);
		$loop3 = new WP_Query($query3);
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		?>
		
			<h2 class="content-heading"><?php echo $title; ?><?php if($custom_url) : ?><a href="<?php echo $custom_url; ?>" class="widget-link"><?php echo $custom_url_text; ?></a><?php endif; ?></h2>
			
			<div class="col3_widget">
				
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
				
				<div class="first_item_col">
					
					<div class="item">
							
						<div class="item-image">
						
						<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
							<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
							<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><img src="<?php echo aq_resize($feat_image,620,377,true,true,true); ?>" /></a>
						<?php else : ?>
							<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/default_slider_img.png" alt="<?php the_title(); ?>" /></a>
						<?php endif; ?>
							
						<?php 
							if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
								if(vp_metabox('hickory_post.hickory_post_type') == 'video') {
									echo '<a href="' . get_permalink() . '"><div class="item-image-icon video"></div></a>';
								} elseif(vp_metabox('hickory_post.hickory_post_type') == 'gallery') {
									echo '<a href="' . get_permalink() . '"><div class="item-image-icon gallery"></div></a>';
								} elseif(vp_metabox('hickory_post.hickory_post_type') == 'review') {
									echo '<div class="review-box"><span class="score">' . vp_metabox('hickory_post.review.0.overall_score') . '</span><span class="text">Score</span></div>';
								} elseif(vp_metabox('hickory_post.hickory_post_type') == 'music') {
									echo '<a href="' . get_permalink() . '"><div class="item-image-icon music"></div></a>';
								}
							}
						?>
							
						</div>
						
						<span class="category">
							<?php
							$category = get_the_category(get_the_ID()); 
							if($category[0]){
							echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
							}
							?>
						</span>
						<span class="item-comments"><?php comments_popup_link( 0, 1, '%', '', ''); ?></span>
						<h3><a href="<?php echo get_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					
						<p><?php echo hick_string_limit_words(get_the_excerpt(), 28); ?> ...</p>
						
						<span class="item_meta"><?php _e('On', 'hickory'); ?> <?php the_time( get_option('date_format') ); ?> <span class="line">/</span> <?php _e('By', 'hickory'); ?> <?php the_author_posts_link(); ?></span>
						
						
					</div>
					
				</div>
				
				<?php endwhile; ?>
				
				<div class="second_item_col">
				
					<?php while ($loop2->have_posts()) : $loop2->the_post(); ?>
						
						<div class="item">
							
							<div class="item-image">
							
							<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
								<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><img src="<?php echo aq_resize($feat_image,300,191,true,true,true); ?>" /></a>
							<?php else : ?>
								<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/default_slider_img.png" alt="<?php the_title(); ?>" /></a>
							<?php endif; ?>
								
							<?php 
							if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
								if(vp_metabox('hickory_post.hickory_post_type') == 'video') {
									echo '<a href="' . get_permalink() . '"><div class="item-image-icon video"></div></a>';
								} elseif(vp_metabox('hickory_post.hickory_post_type') == 'gallery') {
									echo '<a href="' . get_permalink() . '"><div class="item-image-icon gallery"></div></a>';
								} elseif(vp_metabox('hickory_post.hickory_post_type') == 'review') {
									echo '<div class="review-box"><span class="score">' . vp_metabox('hickory_post.review.0.overall_score') . '</span><span class="text">Score</span></div>';
								}
							}
							?>
								
							</div>
							
							<h3><a href="<?php echo get_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							
						</div>
						
					<?php endwhile; ?>
					
				</div>
				
				<div class="third_item_col">
				
					<h3>More Posts</h3>
				
					<?php while ($loop3->have_posts()) : $loop3->the_post(); ?>
						
						<h4><a href="<?php echo get_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
						<span class="item_meta"><?php _e('On', 'hickory'); ?> <?php the_time( get_option('date_format') ); ?></span>
						
					<?php endwhile; ?>
				
				</div>
				
			
			</div>
			
			<?php wp_reset_query(); ?>
			
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
		$instance['categories'] = $new_instance['categories'];
		$instance['post_type'] = $new_instance['post_type'];
		$instance['moreposts'] = $new_instance['moreposts'];
		$instance['exclude'] = $new_instance['exclude'];
		$instance['custom_url'] = $new_instance['custom_url'];
		$instance['custom_url_text'] = $new_instance['custom_url_text'];

		return $instance;
	}


	function form( $instance ) {
		$instance['categories'] = (array) $instance['categories'];
		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest News', 'hickory'), 'categories' => array('all'), 'post_type' => 'all', 'moreposts' => 5);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
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
		<label for="<?php echo $this->get_field_id('post_type'); ?>">Post Types:</label> 
		<select id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" style="width:100%;">
			<option <?php if ( 'all' == $instance['post_type'] ) : echo 'selected="selected"'; endif; ?>>all</option>
			<option <?php if ( 'regular' == $instance['post_type'] ) : echo 'selected="selected"'; endif; ?>>regular</option>
			<option <?php if ( 'video' == $instance['post_type'] ) : echo 'selected="selected"'; endif; ?>>video</option>
			<option <?php if ( 'gallery' == $instance['post_type'] ) : echo 'selected="selected"'; endif; ?>>gallery</option>
			<option <?php if ( 'review' == $instance['post_type'] ) : echo 'selected="selected"'; endif; ?>>review</option>
			<option <?php if ( 'music' == $instance['post_type'] ) : echo 'selected="selected"'; endif; ?>>music</option>
		</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'moreposts' ); ?>"><?php _e('Number of posts to show in More Posts area:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'moreposts' ); ?>" name="<?php echo $this->get_field_name( 'moreposts' ); ?>" value="<?php echo $instance['moreposts']; ?>" size="3" />
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