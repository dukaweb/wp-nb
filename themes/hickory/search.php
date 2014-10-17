<?php get_header(); ?>
			
			<div class="content sidebar">
				
				<h2 class="content-heading"><?php _e('Search Results', 'hickory'); ?></h2>
				
				<?php if (have_posts()) : ?>
				
				<ul class="newsfeed">
				
				<?php $hickory_count = 0; ?>
				<?php while (have_posts()) : the_post(); ?>
				<?php $hickory_count++; $third_div = ($hickory_count%2 == 0) ? 'last' : ''; ?>
				
					<li class="<?php echo $third_div; ?>">
					
					<div class="item">
						
						<div class="item-image">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
							<?php the_post_thumbnail('newsfeed'); ?>
						<?php } ?>
							
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
					
					</li>
				
				<?php endwhile; ?>
				
				</ul>
				
				<?php hick_pagination(); ?>
				
				<?php else : ?>
					
					<p><?php _e('Your search did not return any results. Please try using a different search term.', 'hickory'); ?></p>
					
				<?php endif; ?>
				
			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>