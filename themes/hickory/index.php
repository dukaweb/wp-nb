<?php get_header(); ?>
			
			<?php if(hick_option('hick_featured_toggle')) : ?>
				<?php get_template_part('inc/featured_area/featured', hick_option('hick_featured_layout')); ?>
			<?php endif; ?>
			
			<div class="content<?php if(hick_option('hick_homepage_sidebar') == 1) : echo ' sidebar'; endif; ?>">
				
				<?php if(hick_option('hickory_homepage_layout') == 'hickory_widgets') : ?>
				
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Main Widget Area")) : ?>  
					
					<?php endif; ?>
					
				<?php else : ?>
				
					<h2 class="content-heading"><?php _e('Latest Posts', 'hickory'); ?></h2>
					
					<?php
						$exclude_posts = hick_exclude_posts($exclude_posts);
						
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array(
						  'paged' => $paged,
						  'post__not_in' => $exclude_posts
						);
					?>
					
					<?php $query = new WP_Query( $args ); ?>
					
					<?php if ($query->have_posts()) : ?>
					
					<ul class="newsfeed<?php if(hick_option('hickory_homepage_layout') == 'hickory_list') : echo ' classic'; endif; ?>">
					
					<?php $hickory_count = 0; ?>
					<?php while ($query->have_posts()) : $query->the_post(); ?>
					
					<?php if(hick_option('hick_homepage_sidebar') == 1) : ?>
					<?php $hickory_count++; $third_div = ($hickory_count%2 == 0) ? 'last' : ''; ?>
					<?php else : ?>
					<?php $hickory_count++; $third_div = ($hickory_count%3 == 0) ? 'last' : ''; ?>
					<?php endif; ?>
					
						<li<?php if(($third_div) == 'last') : ?> class="<?php echo $third_div; ?>"<?php endif; ?>>
						
						<div class="item">
							
							<div class="item-image">
							
							<?php if(hick_option('hickory_homepage_layout') == 'hickory_list') : ?>
								
								<?php if(hick_option('hick_homepage_sidebar') == 0) : ?>
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
										<a href="<?php echo get_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('list_thumb_big'); ?></a>
									<?php else : ?>
										<a href="<?php echo get_permalink() ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/list-big-default.png" alt="" /></a>
									<?php endif; ?>
								<?php else : ?>
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
							
							<?php if(hick_option('hickory_homepage_layout') == 'hickory_list') : ?><div class="classic-content"><?php endif; ?>
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
							
							<?php if(hick_option('hickory_homepage_layout') == 'hickory_list') : ?>
						
								<?php if(hick_option('hick_homepage_sidebar') == 0) : ?>
									<p><?php echo hick_string_limit_words(get_the_excerpt(), 62); ?> ...</p>
								<?php else : ?>
									<p><?php echo hick_string_limit_words(get_the_excerpt(), 19); ?> ...</p>
								<?php endif; ?>
								
							<?php else : ?>
							
								<p><?php echo hick_string_limit_words(get_the_excerpt(), 28); ?> ...</p>
								
							<?php endif; ?>
							
							<span class="item_meta"><?php _e('On', 'hickory'); ?> <?php the_time( get_option('date_format') ); ?> <span class="line">/</span> <?php _e('By', 'hickory'); ?> <?php the_author_posts_link(); ?></span>
							<?php if(hick_option('hickory_homepage_layout') == 'hickory_list') : ?></div><?php endif; ?>
							
						</div>
						
						</li>
					
					<?php endwhile; ?>
					
					</ul>
					
					<?php hick_pagination(); ?>
					
					<?php endif; ?>
					
				<?php endif; ?>
				
			</div>
			
<?php if(hick_option('hick_homepage_sidebar') == 1) : ?>
<?php get_sidebar(); ?>
<?php endif; ?>

<?php get_footer(); ?>