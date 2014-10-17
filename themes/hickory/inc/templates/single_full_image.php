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
								<iframe width="940" height="<?php echo $video_height; ?>" src="//www.youtube.com/embed/<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
								<?php elseif(($video_url_length) == '8') : ?>
								<iframe src="http://player.vimeo.com/video/<?php echo $video_url; ?>" width="940" height="<?php echo $video_height; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
								<?php else : ?>
								<p>Not a valid video ID from Youtube or Vimeo.</p>
								<?php endif; ?>
								
								
							<?php elseif(vp_metabox('hickory_post.video.0.source') == 'self_hosted') : ?>
							
								<div style="width: 940px; max-width: 100%;"><!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
								<video class="wp-video-shortcode" width="940" height="<?php echo vp_metabox('hickory_post.video.0.self_hosted_height'); ?>" preload="metadata" controls="controls"><source type="video/mp4" src="<?php echo vp_metabox('hickory_post.video.0.self_hosted_url'); ?>" /><a href="<?php echo vp_metabox('hickory_post.video.0.self_hosted_url'); ?>"><?php echo vp_metabox('hickory_post.video.0.self_hosted_url'); ?></a></video></div>
							
							<?php else : ?>
								
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
									<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
									<a href="<?php echo $url; ?>" class="post-gallery"><?php the_post_thumbnail(); ?></a>
								<?php } ?>
								
							<?php endif; ?>
							
						</div>
						
					<?php elseif(vp_metabox('hickory_post.hickory_post_type') == 'gallery') : ?>
					
						<?php $gallery_images = vp_metabox('hickory_post.gallery.0.images'); ?>
						<div class="flexslider gallery full">
						
							<ul class="slides">
								
								<?php 
								foreach ($gallery_images as $gallery_img) {
								?>
								
									<li data-thumb="<?php echo aq_resize($gallery_img['image'],100,100,true); ?>">
										<a href="<?php echo $gallery_img['image']; ?>" title="<?php echo $gallery_img['caption']; ?>" class="post-gallery" rel="gallery-group"><img src="<?php echo aq_resize($gallery_img['image'],940,520,true,true,true); ?>" /></a>
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
								<a href="<?php echo $url; ?>" class="post-gallery"><?php the_post_thumbnail('full_thumb'); ?></a>
							<?php } ?>
							<?php endif; ?>
							<?php echo vp_metabox('hickory_post.music.0.soundcloud_embed'); ?>
							</div>
						<?php elseif(vp_metabox('hickory_post.music.0.source') == 'spotify') : ?>
							<div class="post-image<?php if(vp_metabox('hickory_post.music.0.spotify_include_featured_image')) : ?> music_spotify<?php endif; ?>">
							<?php if(vp_metabox('hickory_post.music.0.spotify_include_featured_image')) : ?>
								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<a href="<?php echo $url; ?>" class="post-gallery"><?php the_post_thumbnail('full_thumb'); ?></a>
							<?php } ?>
							<?php endif; ?>
							<iframe src="https://embed.spotify.com/?uri=<?php echo vp_metabox('hickory_post.music.0.spotify_embed'); ?>" width="100%" height="80" frameborder="0" allowtransparency="true"></iframe>
							</div>
						<?php endif; ?>
					
					<?php else : ?>
					
						<div class="post-image full">
						
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<a href="<?php echo $url; ?>" class="post-gallery"><?php the_post_thumbnail('full_thumb'); ?></a>
							<?php } ?>
						
						</div>
					
					<?php endif; ?>
					
					<?php endif; ?>
					
					<div class="content<?php if(vp_metabox('hickory_post.post_size') == 'full_post') : ?> fullpost<?php else : ?> sidebar<?php endif; ?>">
					
						<div class="post">