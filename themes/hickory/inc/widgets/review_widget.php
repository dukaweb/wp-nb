<?php
/**
 * Plugin Name: Review Widget
 */

add_action( 'widgets_init', 'hickory_review_load_widget' );

function hickory_review_load_widget() {
	register_widget( 'hickory_review_widget' );
}

class hickory_review_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function hickory_review_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'hickory_review_widget', 'description' => __('A widget that displays your highest rated reviews', 'hickory_review_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'hickory_review_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'hickory_review_widget', __('Hickory: Highest Rated Reviews', 'hickory_review_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = $instance['categories'];
		$sortby = $instance['sortby'];
		$number = $instance['number'];
		
		if($sortby == 'this week') {
		function filter_where($where = '') {
			//posts in the last 7 days
			$where .= " AND post_date > '" . date('Y-m-d', strtotime('-7 days')) . "'";
			return $where;
		}
		add_filter('posts_where', 'filter_where');
		} elseif($sortby == 'this month') {
		function filter_where($where = '') {
			//posts in the last 30 days
			$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
			return $where;
		}
		add_filter('posts_where', 'filter_where');
		}
		
		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories, 'meta_key' => 'hickory_review_score', 'orderby' => 'meta_value');
		
		$loop = new WP_Query($query);
		if ($loop->have_posts()) :
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			<ul class="side-newsfeed">
			
			<?php  while ($loop->have_posts()) : $loop->the_post(); ?>
			
				<li>
				
					<div class="side-item">
											
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
						<div class="side-image">
							<a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('side_item_thumb', array('class' => 'side-item-thumb')); ?></a>

							<?php 
							if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
								if(vp_metabox('hickory_post.hickory_post_type') == 'video') {
									echo '<div class="side-icon video"></div>';
								} elseif(vp_metabox('hickory_post.hickory_post_type') == 'gallery') {
									echo '<div class="side-icon gallery"></div>';
								} elseif(vp_metabox('hickory_post.hickory_post_type') == 'review') {
									echo '<div class="review-box"><span class="score">' . vp_metabox('hickory_post.review.0.overall_score') . '</span></div>';
								}
							}
							?>
						
						</div>
						<?php endif; ?>
						<div class="side-item-text">
							<h4><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?></span>
						</div>
					</div>
				
				</li>
			
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<?php endif; ?>
			<?php remove_filter( 'posts_where', 'filter_where' ); ?>
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
		$instance['categories'] = $new_instance['categories'];
		$instance['sortby'] = $new_instance['sortby'];
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest Reviews', 'hickory'), 'number' => 5, 'categories' => '', 'sortby' => 'latest');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
		</p>
		
		<!-- Category -->
		<p>
		<label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label> 
		<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
			<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>
			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
			<?php foreach($categories as $category) { ?>
			<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
			<?php } ?>
		</select>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('sortby'); ?>">Sort by:</label> 
		<select id="<?php echo $this->get_field_id('sortby'); ?>" name="<?php echo $this->get_field_name('sortby'); ?>" style="width:100%;">
			<option <?php if ( 'all time' == $instance['sortby'] ) : echo 'selected="selected"'; endif; ?>>all time</option>
			<option <?php if ( 'this week' == $instance['sortby'] ) : echo 'selected="selected"'; endif; ?>>this week</option>
			<option <?php if ( 'this month' == $instance['sortby'] ) : echo 'selected="selected"'; endif; ?>>this month</option>
		</select>
		</p>
		
		<!-- Number of posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:', 'hickory'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
		</p>


	<?php
	}
}

?>