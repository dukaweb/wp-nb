<?php
/**
 * Plugin Name: Homepage Post Widget
 */

add_action( 'widgets_init', 'hickory_homepage_load_widget' );

function hickory_homepage_load_widget() {
	register_widget( 'hickory_homepage_widget' );
}

class hickory_homepage_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function hickory_homepage_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hickory_homepage_widget', 'description' => __('A widget used for the homepage to display latest news or categories', 'hickory_homepage_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'hickory_homepage_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'hickory_homepage_widget', __('Hickory: Homepage Post Widget', 'hickory_homepage_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$layout = $instance['layout'];
		$categories = (array) $instance['categories'];
		$post_type = $instance['post_type'];
		$number = $instance['number'];
		$exclude = $instance['exclude'];
		$custom_url = $instance['custom_url'];
		$custom_url_text = $instance['custom_url_text'];
		
		if($exclude) :
			$exclude_posts = hick_exclude_posts($exclude);
		endif;
				
		if($post_type == 'all') :
			$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'post__not_in' => $exclude_posts);
		elseif( in_array( $post_type, array( 'regular', 'video', 'gallery', 'review', 'music' ) ) ) :
			$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'meta_key' => 'hickory_post_type', 'meta_value' => $post_type, 'post__not_in' => $exclude_posts);
		else :
			$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'post__not_in' => $exclude_posts);
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
			
			<h2 class="content-heading"><?php echo $title; ?><?php if($custom_url) : ?><a href="<?php echo $custom_url; ?>" class="widget-link"><?php echo $custom_url_text; ?></a><?php endif; ?></h2>
			
			<ul class="newsfeed<?php if(($layout) == 'list') : echo ' classic'; endif; ?>">
			
			<?php $hickory_count = 0; ?>
			<?php while ($loop->have_posts()) : $loop->the_post(); ?>
			
			<?php if(is_page_template('page_fullwidth.php')) : ?>
				
				<?php $hickory_count++; $third_div = ($hickory_count%3 == 0) ? 'last' : ''; ?>
			
			<?php elseif(is_archive() || is_page()) : ?>
			
				<?php $hickory_count++; $third_div = ($hickory_count%2 == 0) ? 'last' : ''; ?>
				
			<?php else : ?>
			
				<?php if(hick_option('hick_homepage_sidebar') == 1) : ?>
				<?php $hickory_count++; $third_div = ($hickory_count%2 == 0) ? 'last' : ''; ?>
				<?php else : ?>
				<?php $hickory_count++; $third_div = ($hickory_count%3 == 0) ? 'last' : ''; ?>
				<?php endif; ?>
			
			<?php endif; ?>
			
				<li<?php if(($third_div) == 'last') : ?> class="<?php echo $third_div; ?>"<?php endif; ?>>
				
				<div class="item">
							
					<div class="item-image">
					
					<?php if($layout == 'list') : ?>
						
						<?php if(hick_option('hick_homepage_sidebar') == 0 && is_home() || is_page_template('page_fullwidth.php')) : ?>
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
								<a href="<?php echo get_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('list_thumb_big'); ?></a>
							<?php else : ?>
								<a href="<?php echo get_permalink() ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/list-big-default.png" alt="" /></a>
							<?php endif; ?>
						<?php elseif(is_page() || hick_option('hick_homepage_sidebar') == 1) : ?>
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
								<a href="<?php echo get_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('list_thumb'); ?></a>
							<?php else : ?>
								<a href="<?php echo get_permalink() ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/list-default.png" alt="" /></a>
							<?php endif; ?>
						<?php endif; ?>
						
					<?php else : ?>
						<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
							<a href="<?php echo get_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('newsfeed'); ?></a>
						<?php else : ?>
							
						<?php endif; ?>
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
					
					<?php if(($layout) == 'list') : ?><div class="classic-content"><?php endif; ?>
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
					
					<?php if(($layout) == 'list') : ?>
						
						<?php if(hick_option('hick_homepage_sidebar') == 0 && is_home() || is_page_template('page_fullwidth.php')) : ?>
							<p><?php echo hick_string_limit_words(get_the_excerpt(), 62); ?> ...</p>
						<?php else : ?>
							<p><?php echo hick_string_limit_words(get_the_excerpt(), 19); ?> ...</p>
						<?php endif; ?>
						
					<?php else : ?>
						<p><?php echo hick_string_limit_words(get_the_excerpt(), 28); ?> ...</p>
					<?php endif; ?>
					
					<span class="item_meta"><?php _e('On', 'hickory'); ?> <?php the_time( get_option('date_format') ); ?> <span class="line">/</span> <?php _e('By', 'hickory'); ?> <?php the_author_posts_link(); ?></span>
					<?php if(($layout) == 'list') : ?></div><?php endif; ?>
						
				</div>
				
				</li>
			
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<?php endif; ?>
			
			</ul>
			
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
		$instance['layout'] = $new_instance['layout'];
		$instance['categories'] = $new_instance['categories'];
		$instance['post_type'] = $new_instance['post_type'];
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['exclude'] = $new_instance['exclude'];
		$instance['custom_url'] = $new_instance['custom_url'];
		$instance['custom_url_text'] = $new_instance['custom_url_text'];

		return $instance;
	}


	function form( $instance ) {
		
		$instance['categories'] = (array) $instance['categories'];
		
		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest News', 'hickory'), 'number' => 6, 'layout' => 'grid', 'categories' => array('all'), 'post_type' => 'all');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('layout'); ?>">Layout:</label> 
		<select id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>" style="width:100%;">
			<option <?php if ( 'grid' == $instance['layout'] ) : echo 'selected="selected"'; endif; ?>>grid</option>
			<option <?php if ( 'list' == $instance['layout'] ) : echo 'selected="selected"'; endif; ?>>list</option>
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
		
		<!-- Number of posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
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