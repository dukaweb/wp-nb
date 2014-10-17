			<div id="featured_area" class="threeposts">
				
				<?php if(hick_option('hick_featured_layout1_data')) : ?>
				
				<?php $postid = hick_option('hick_featured_layout1_data'); ?>

				<div class="feature_big">
				
					<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_image', false, $postid[0] )) : ?>
					<?php $image_url = vp_metabox( 'hickory_post.featured_data.0.custom_image', false, $postid[0] ); ?>
					<a href="<?php echo get_permalink($postid[0]) ?>" rel="bookmark"><img src="<?php echo aq_resize($image_url,620,420,true,true,true); ?>" alt="" /></a>
					<?php else : ?>
					<a href="<?php echo get_permalink($postid[0]) ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $postid[0], 'feature_big' ); ?></a>
					<?php endif; ?>
					
					<div class="feature_text">
						<span class="category">
						<?php
							$category = get_the_category($postid[0]); 
							if($category[0]){
								echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
							}
						?>
						</span>
						<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_title', false, $postid[0] )) : ?>
						<h2><a href="<?php echo get_permalink($postid[0]) ?>" rel="bookmark"><?php echo vp_metabox( 'hickory_post.featured_data.0.custom_title', false, $postid[0] ); ?></a></h2>
						<?php else : ?>
						<h2><a href="<?php echo get_permalink($postid[0]) ?>" rel="bookmark"><?php echo get_the_title($postid[0]); ?></a></h2>
						<?php endif; ?>
					</div>
					<a href="<?php echo get_permalink($postid[0]) ?>" rel="bookmark"><div class="feature_overlay"></div></a>
				</div>
				
				<?php $postid = hick_option('hick_featured_layout1_data'); ?>
				<div class="feature_small first">
				
					<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_image', false, $postid[1] )) : ?>
					<?php $image_url = vp_metabox( 'hickory_post.featured_data.0.custom_image', false, $postid[1] ); ?>
					<a href="<?php echo get_permalink($postid[1]) ?>" rel="bookmark"><img src="<?php echo aq_resize($image_url,300,200,true,true,true); ?>" alt="" /></a>
					<?php else : ?>
					<a href="<?php echo get_permalink($postid[1]) ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $postid[1], 'feature_small' ); ?></a>
					<?php endif; ?>
					
					<div class="feature_text">
						<span class="category">
						<?php 
							$category = get_the_category($postid[1]); 
							if($category[0]){
								echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
							}
						?>
						</span>
						<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_title', false, $postid[1] )) : ?>
						<h2><a href="<?php echo get_permalink($postid[1]) ?>" rel="bookmark"><?php echo vp_metabox( 'hickory_post.featured_data.0.custom_title', false, $postid[1] ); ?></a></h2>
						<?php else : ?>
						<h2><a href="<?php echo get_permalink($postid[1]) ?>" rel="bookmark"><?php echo get_the_title($postid[1]); ?></a></h2>
						<?php endif; ?>
					</div>
					<a href="<?php echo get_permalink($postid[1]) ?>" rel="bookmark"><div class="feature_overlay"></div></a>
				</div>
				
				<?php $postid = hick_option('hick_featured_layout1_data'); ?>
				<div class="feature_small">
				
					<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_image', false, $postid[2] )) : ?>
					<?php $image_url = vp_metabox( 'hickory_post.featured_data.0.custom_image', false, $postid[2] ); ?>
					<a href="<?php echo get_permalink($postid[2]) ?>" rel="bookmark"><img src="<?php echo aq_resize($image_url,300,200,true,true,true); ?>" alt="" /></a>
					<?php else : ?>
					<a href="<?php echo get_permalink($postid[2]) ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $postid[2], 'feature_small' ); ?></a>
					<?php endif; ?>
					
					<div class="feature_text">
						<span class="category">
						<?php 
							$category = get_the_category($postid[2]); 
							if($category[0]){
								echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
							}
						?>
						</span>
						<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_title', false, $postid[2] )) : ?>
						<h2><a href="<?php echo get_permalink($postid[2]) ?>" rel="bookmark"><?php echo vp_metabox( 'hickory_post.featured_data.0.custom_title', false, $postid[2] ); ?></a></h2>
						<?php else : ?>
						<h2><a href="<?php echo get_permalink($postid[2]) ?>" rel="bookmark"><?php echo get_the_title($postid[2]); ?></a></h2>
						<?php endif; ?>
					</div>
					<a href="<?php echo get_permalink($postid[2]) ?>" rel="bookmark"><div class="feature_overlay"></div></a>
				</div>
				
				<?php else : ?>
					
					<?php 
						
						$query = array('showposts' => 3, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories, 'meta_key' => 'is_featured', 'meta_value' => 1);
						
						$loop = new WP_Query($query);
						if ($loop->have_posts()) :
						
						$hickory_count = 0;
						while ($loop->have_posts()) : $loop->the_post(); $hickory_count++; ?>
						
							<?php if($hickory_count == 1) : ?>
							
								<div class="feature_big">
				
									<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() )) : ?>
									<?php $image_url = vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() ); ?>
									<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><img src="<?php echo aq_resize($image_url,620,420,true,true,true); ?>" alt="" /></a>
									<?php else : ?>
									<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><?php echo get_the_post_thumbnail( get_the_ID(), 'feature_big' ); ?></a>
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
									<a href="<?php echo get_permalink($postid[0]) ?>" rel="bookmark"><div class="feature_overlay"></div></a>
								</div>
								
							<?php else : ?>
							
								<div class="feature_small<?php if($hickory_count == 2) : ?> first<?php endif; ?>">
								
									<?php if(vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() )) : ?>
									<?php $image_url = vp_metabox( 'hickory_post.featured_data.0.custom_image', false, get_the_ID() ); ?>
									<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><img src="<?php echo aq_resize($image_url,300,200,true,true,true); ?>" alt="" /></a>
									<?php else : ?>
									<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><?php echo get_the_post_thumbnail( get_the_ID(), 'feature_small' ); ?></a>
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
									<a href="<?php echo get_permalink(get_the_ID()) ?>" rel="bookmark"><div class="feature_overlay"></div></a>
									
								</div>
								
							<?php endif; ?>
							
						<?php endwhile; ?>
						<?php endif; ?>
					
				<?php endif; ?>
				
			</div>