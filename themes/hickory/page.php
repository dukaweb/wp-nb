<?php get_header(); ?>
			
			<?php if(vp_metabox('hickory_page.hickory_page_slider') == 1) : ?>
				<?php get_template_part('inc/featured_area/featured-2'); ?>
			<?php elseif(vp_metabox('hickory_page.hickory_page_slider') == 2) : ?>
				<?php get_template_part('inc/featured_area/featured'); ?>
			<?php endif; ?>
			
			<div class="content sidebar page">
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post">
					
					<?php if(vp_metabox('hickory_page.page_featured_img') == 1) : ?>
					<?php else : ?>
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<div class="post-image">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php } ?>
					<?php endif; ?>
					
					<?php if(vp_metabox('hickory_page.page_title') == 1) : ?>
					<?php else : ?>
					<div class="post-header">
						
						<h1><?php the_title(); ?></h1>
						
					</div>
					<?php endif; ?>
					
					<?php if(vp_metabox('hickory_page.page_content') == 1) : ?>
					<?php else : ?>
					<div class="post-entry">
					
						<?php the_content(); ?>
						
					</div>
					<?php endif; ?>
					
					<?php if(vp_metabox('hickory_page.page_share') == 1) : ?>
					<?php else : ?>
					<div class="post-share">
						
						<span class="share-text">
							<?php _e('Share', 'hickory'); ?>
						</span>
						
						<span class="share-item">
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="Check out this article: <?php the_title(); ?> - <?php the_permalink(); ?>" data-dnt="true">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</span>
						
						<span class="share-item">
							<iframe src="//www.facebook.com/plugins/like.php?locale=en_US&amp;href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;width=250&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:21px;" allowTransparency="true"></iframe>
						</span>
						<span class="share-item google">
							<div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>
						</span>
						<?php
							// try getting featured image
							$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
							if( ! $featured_img )
							{
								$featured_img = '';
							}
							else
							{
								$featured_img = $featured_img[0];
							}
						?>
						<span class="share-item">
							<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>
								&amp;media=<?php echo $featured_img; ?>
								&amp;description=<?php echo urlencode(get_the_title()); ?>" 
								class="pin-it-button" 
								count-layout="horizontal">
								<img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" />
							</a>
						</span>
						
					</div>
					<?php endif; ?>
					
					<!-- INCLUDE COMMENTS TEMPLATE -->
					<?php if(comments_open()) : ?>
					<?php comments_template( '', true );  ?>
					<?php endif; ?>
					
				</div>
				
				<?php endwhile; ?>
				
				<?php 
					if(hick_option('hick_widgets_pages')) :
					$hk_pages = hick_option('hick_widgets_pages');
					$hk_currentpage = $wp_query->get_queried_object_id();
					
					foreach ($hk_pages as $hk_page) {
						
						if($hk_page == $hk_currentpage) { ?>
						
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Main Widget Area")) : ?><?php endif; ?>
							
				  <?php }
						
					}
					
					endif;

				?>
				
				<?php endif; ?>
			
			</div>

<?php get_sidebar(); ?>
			
<?php get_footer(); ?>