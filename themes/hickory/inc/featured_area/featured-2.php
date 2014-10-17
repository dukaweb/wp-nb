			<div id="featured_area">
				
				<?php if(hick_option('hick_featured_layout2_data')) : ?>
				
				<?php $postid = hick_option('hick_featured_layout2_data'); ?>

				<div class="flexslider homepage main-slider">
					<ul class="slides">
						<?php foreach ($postid as $thepostid): ?>
							
						<li>
							<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_image', false, $thepostid )) : ?>
							<?php $image_url = vp_metabox( 'hickory_post.featured_data.0.custom_image', false, $thepostid ); ?>
							<a href="<?php echo get_permalink($thepostid) ?>" rel="bookmark"><img src="<?php echo aq_resize($image_url,940,520,true,true,true); ?>" alt="" /></a>
							<?php else : ?>
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail($thepostid))  ) : ?>
									<a href="<?php echo get_permalink($thepostid) ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $thepostid, 'slider_thumb' ); ?></a>
								<?php else : ?>
									<a href="<?php echo get_permalink($thepostid) ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/default_slider_img.png" alt="<?php the_title(); ?>" /></a>
								<?php endif; ?>
							<?php endif; ?>
							<div class="feature_text">
								<span class="category">
								<?php 
									$category = get_the_category($thepostid); 
									if($category[0]){
										echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
									}
								?>
								</span>
								<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_title', false, $thepostid )) : ?>
								<h2><a href="<?php echo get_permalink($thepostid) ?>" rel="bookmark"><?php echo vp_metabox( 'hickory_post.featured_data.0.custom_title', false, $thepostid ); ?></a></h2>
								<?php else : ?>
								<h2><a href="<?php echo get_permalink($thepostid) ?>" rel="bookmark"><?php echo get_the_title($thepostid); ?></a></h2>
								<?php endif; ?>
							</div>
							<a href="<?php echo get_permalink($thepostid) ?>" rel="bookmark"><div class="feature_overlay"></div></a>
						</li>
							
						<?php endforeach; ?>

					</ul>
				</div>
				
				<?php else : ?>
				
				<?php 
					
					$query = array('showposts' => 5, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories, 'meta_key' => 'is_featured', 'meta_value' => 1);
					
					$loop = new WP_Query($query);
					if ($loop->have_posts()) : ?>
					
					<div class="flexslider homepage main-slider">
					
						<ul class="slides">
					
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
						
							<li>
								<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() )) : ?>
								<?php $image_url = vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() ); ?>
								<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><img src="<?php echo aq_resize($image_url,940,520,true,true,true); ?>" alt="" /></a>
								<?php else : ?>
									<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail(get_the_ID()))  ) : ?>
										<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><?php echo get_the_post_thumbnail( get_the_ID(), 'slider_thumb' ); ?></a>
									<?php else : ?>
										<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/default_slider_img.png" alt="<?php the_title(); ?>" /></a>
									<?php endif; ?>
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
								<a href="<?php echo get_permalink($thepostid) ?>" rel="bookmark"><div class="feature_overlay"></div></a>
							</li>
						
						<?php endwhile; ?>
						
						</ul>
						
					</div>
					
					<?php endif; ?>
					
				<?php endif; ?>
				
			</div>