<?php get_header(); ?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php if( vp_metabox('hickory_post.image_size') == 'full' || vp_metabox('hickory_post.post_size') == 'full_post') : ?>
				
			<?php get_template_part('inc/templates/single_full_image'); ?>
				
			<?php else : ?>
			
			<div class="content<?php if(vp_metabox('hickory_post.post_size') == 'full_post') : ?> fullpost<?php else : ?> sidebar<?php endif; ?>">
			
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php if(vp_metabox('hickory_post.show_featured_image') == 1) : ?>
					<?php else : ?>
					
					<?php if(vp_metabox('hickory_post.hickory_post_type') == 'video' || vp_metabox('hickory_post.music.0.source') == 'embed') : ?>
						
						<div class="post-image">
						
							<?php if(vp_metabox('hickory_post.video.0.source') == 'embed' || vp_metabox('hickory_post.music.0.source') == 'embed') : ?>
							
								<?php 
									
									$video_url = vp_metabox('hickory_post.music.0.embed_url');
									
									if(empty($video_url)) :
									$video_url = vp_metabox('hickory_post.video.0.embed_url');
									endif;
									
									$video_height = vp_metabox('hickory_post.video.0.embed_height');
									
									
									$video_url_length = strlen($video_url);
								?>
				
								<?php if(($video_url_length) == '11') : ?>
								<iframe width="620" height="<?php echo $video_height; ?>" src="//www.youtube.com/embed/<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
								<?php elseif(($video_url_length) == '8') : ?>
								<iframe src="http://player.vimeo.com/video/<?php echo $video_url; ?>" width="620" height="<?php echo $video_height; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
								<?php else : ?>
								<p>Not a valid video ID from Youtube or Vimeo.</p>
								<?php endif; ?>
								
								
							<?php elseif(vp_metabox('hickory_post.video.0.source') == 'self_hosted') : ?>
							
								<div style="width: 620px; max-width: 100%;"><!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
								<video class="wp-video-shortcode" width="620" height="<?php echo vp_metabox('hickory_post.video.0.self_hosted_height'); ?>" preload="metadata" controls="controls"><source type="video/mp4" src="<?php echo vp_metabox('hickory_post.video.0.self_hosted_url'); ?>" /><a href="<?php echo vp_metabox('hickory_post.video.0.self_hosted_url'); ?>"><?php echo vp_metabox('hickory_post.video.0.self_hosted_url'); ?></a></video></div>
							
							<?php else : ?>
								
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
									<a href="<?php echo $url; ?>" class="post-gallery"><?php the_post_thumbnail(); ?></a>
								<?php } ?>
								
							<?php endif; ?>
							
						</div>
						
					<?php elseif(vp_metabox('hickory_post.hickory_post_type') == 'gallery') : ?>
					
						<?php $gallery_images = vp_metabox('hickory_post.gallery.0.images'); ?>
						<div class="flexslider gallery">
						
							<ul class="slides">
								
								<?php 
									foreach ($gallery_images as $gallery_img) {
								?>
								
									<li data-thumb="<?php echo aq_resize($gallery_img['image'],80,80,true); ?>">
										<a href="<?php echo $gallery_img['image']; ?>" title="<?php echo $gallery_img['caption']; ?>" class="post-gallery" rel="gallery-group"><img src="<?php echo aq_resize($gallery_img['image'],620,420,true,true,true); ?>" /></a>
									</li>
								
								<?php
									}
								?>

							</ul>
							
						</div>
						
					<?php elseif(vp_metabox('hickory_post.hickory_post_type') == 'music') : ?>
						
						<?php if(vp_metabox('hickory_post.music.0.source') == 'soundcloud') : ?>
							<div class="post-image<?php if(vp_metabox('hickory_post.music.0.soundcloud_include_featured_image')) : ?> music_soundcloud<?php endif; ?>">
							<?php if(vp_metabox('hickory_post.music.0.soundcloud_include_featured_image')) : ?>
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
									<a href="<?php echo $url; ?>" class="post-gallery"><?php the_post_thumbnail(); ?></a>
								<?php } ?>
							<?php endif; ?>
							<?php echo vp_metabox('hickory_post.music.0.soundcloud_embed'); ?>
							</div>
						<?php elseif(vp_metabox('hickory_post.music.0.source') == 'spotify') : ?>
							<div class="post-image<?php if(vp_metabox('hickory_post.music.0.spotify_include_featured_image')) : ?> music_spotify<?php endif; ?>">
							<?php if(vp_metabox('hickory_post.music.0.spotify_include_featured_image')) : ?>
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
									<a href="<?php echo $url; ?>" class="post-gallery"><?php the_post_thumbnail(); ?></a>
								<?php } ?>
							<?php endif; ?>
							<iframe src="https://embed.spotify.com/?uri=<?php echo vp_metabox('hickory_post.music.0.spotify_embed'); ?>" width="100%" height="80" frameborder="0" allowtransparency="true"></iframe>
							</div>
						<?php endif; ?>
					
					<?php else : ?>
					
						<div class="post-image">
						
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<a href="<?php echo $url; ?>" class="post-gallery"><?php the_post_thumbnail(); ?></a>
							<?php } ?>
						
						</div>
					
					<?php endif; ?>
					
					<?php endif; ?>
					
			<?php endif; ?>	
					
					<div class="post-header">
						
						<span class="cat"><?php the_category(', ') ?></span>
						<span class="item-comments"><?php comments_popup_link( 0, 1, '%', '', ''); ?></span>
						<h1><?php the_title(); ?></h1>
						<?php
							
							$authorname = get_the_author();

						?>
						<span class="post-meta"><?php _e('By', 'hickory'); ?> <?php the_author_posts_link(); ?> <?php if(get_the_author_meta('twitter')) : ?><a href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>" class="author-twitter" title="Follow <?php echo $authorname; ?> on Twitter">@<?php echo the_author_meta('twitter'); ?></a><?php endif; ?> <span class="line">&#183;</span> <?php _e('On', 'hickory'); ?> <?php the_time( get_option('date_format') ); ?></span>
						
					</div>
					
					<div class="post-entry">
						
						<?php global $multipage, $numpages, $page; ?>
						<?php if($multipage) : ?>
						<div class="post-pagi">
						<span class="number"><?php echo $page; ?> of <?php echo $numpages; ?></span>
						<?php $args = array(
							'before'           => '<p>',
							'after'            => '</p>',
							'link_before'      => '',
							'link_after'       => '',
							'next_or_number'   => 'next',
							'nextpagelink'     => __('<span class="next">Next &rarr;</span>'),
							'previouspagelink' => __('<span class="prev">&larr; Previous</span>'),
							'pagelink'         => '%',
							'echo'             => 1
						); ?>
						<?php wp_link_pages( $args ); ?>
						</div>
						<?php endif; ?>
						
						<?php the_content(); ?>
						
						<?php if(vp_metabox('hickory_post.hickory_post_type') == 'review') : ?>
						  <div itemscope itemtype="http://schema.org/Review" style="display:none;">
						   <div itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing"><span itemprop="name"><?php the_title(); ?></span></div> <div itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"> <?php $author = get_the_author(); echo $author; ?></span></div><meta itemprop="datePublished" content="<?php the_date('Y-m-d'); ?>"><?php the_time( get_option('date_format') ); ?>  <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
							<meta itemprop="worstRating" content="1"/><span itemprop="ratingValue"><?php echo vp_metabox('hickory_post.review.0.overall_score'); ?></span>/<span itemprop="bestRating">10</span></div>
							 <span itemprop="description"><?php echo wp_kses_post(vp_metabox('hickory_post.review.0.summary_text')); ?></span>
						   </div>
						<div class="post-review">
							
							<div class="review-top">
								
								<div class="overall-score">
									
									<span class="overall"><?php echo vp_metabox('hickory_post.review.0.overall_score'); ?></span>
									<span class="overall-text"><?php _e('Overall Score', 'hickory'); ?></span>
									
								</div>
								
								<div class="review-text">
								
									<span class="review-header"><?php echo vp_metabox('hickory_post.review.0.review_heading'); ?></span>
									<p>
										<?php echo wp_kses_post(vp_metabox('hickory_post.review.0.summary_text')); ?>
									</p>
								
								</div>
								
							</div>
							<?php $thecriteria = vp_metabox('hickory_post.review.0.criteria'); $firstcriteria = $thecriteria[0]['name']; ?>
							<?php if($firstcriteria) : ?>
							<div class="review-criteria">
								
								<?php $thecriteria = vp_metabox('hickory_post.review.0.criteria'); ?>
								
								<?php foreach ($thecriteria as $criteria) { ?>
										
									<div class="criteria">
										<div class="thescore" style="width:<?php echo hickory_criteria($criteria['score']); ?>%;"><span class="criteria-name"><?php echo $criteria['name']; ?></span></div>
										<span class="criteria-score"><?php echo $criteria['score']; ?></span>
									</div>
										
								<?php } ?>
								
							</div>
							<?php endif; ?>
							
						</div>
						<?php endif; ?>
						
						<?php if(vp_metabox('hickory_post.show_tags') == 1) : ?>
						<?php else : ?>
						<div class="post-tags">
							<?php the_tags("",""); ?>
						</div>
						<?php endif; ?>
						
					</div>
					
					<?php if(vp_metabox('hickory_post.show_share_buttons') == 1) : ?>
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
							<iframe src="//www.facebook.com/plugins/like.php?locale=en_US&amp;href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;width=250&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe>
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
					
					<?php if(vp_metabox('hickory_post.show_author_box') == 1) : ?>
					<?php else : ?>
					<div class="post-author">
						
						<div class="author-image">
							<?php echo get_avatar( get_the_author_meta('email'), '110' ); ?>
						</div>
						<div class="author-info">
							
							<h4><?php the_author_posts_link(); ?></h4>
							<p><?php the_author_meta('description'); ?></p>
							
							<div class="author-connect">
																
								<?php if(get_the_author_meta('facebook')) : ?><a href="http://facebook.com/<?php echo the_author_meta('facebook'); ?>" class="author-social facebook"></a><?php endif; ?>
								<?php if(get_the_author_meta('twitter')) : ?><a href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>" class="author-social twitter"></a><?php endif; ?>
								<?php if(get_the_author_meta('google')) : ?><a href="http://plus.google.com/<?php echo the_author_meta('google'); ?>?rel=author" class="author-social google"></a><?php endif; ?>
								<?php if(get_the_author_meta('tumblr')) : ?><a href="http://<?php echo the_author_meta('tumblr'); ?>.tumblr.com" class="author-social tumblr"></a><?php endif; ?>
								<?php if(get_the_author_meta('instagram')) : ?><a href="http://instagram.com/<?php echo the_author_meta('instagram'); ?>" class="author-social instagram"></a><?php endif; ?>
								
							</div>
							
						</div>
						
					</div>
					<?php endif; ?>
					
					<?php if(vp_metabox('hickory_post.show_related_posts') == 1) : ?>
					<?php else : ?>
					<!-- INCLUDE RELATED POSTS -->
					<?php get_template_part('inc/templates/related_posts'); ?>
					<?php endif; ?>
					
					<!-- INCLUDE COMMENTS TEMPLATE -->
					<?php comments_template( '', true );  ?>
				
				</div>
				<?php endwhile; endif; ?>
			
			</div>

<?php if(vp_metabox('hickory_post.post_size') == 'full_post') : ?><?php else : ?><?php get_sidebar(); ?><?php endif; ?>
			
<?php get_footer(); ?>