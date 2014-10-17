
		</div>
		<!-- END CONTAINER -->
		
	</div>
	<!-- END WRAPPER -->
	
	<div id="footer">
	
		<div class="container footer">
		
			<div class="footer_top">
				
				<div class="footer_navigation">
				
					<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'footer-menu' ) ); ?>	
				
				</div>
				
				<?php if(hick_option('hick_footer_social')) : ?>
				<div id="footer_social">
				
					<?php if(hick_option('hick_facebook')) : ?><a href="http://facebook.com/<?php echo hick_option('hick_facebook'); ?>"><i class="icon-facebook"></i></a><?php endif; ?>
					<?php if(hick_option('hick_twitter')) : ?><a href="http://twitter.com/<?php echo hick_option('hick_twitter'); ?>"><i class="icon-twitter"></i></a><?php endif; ?>
					<?php if(hick_option('hick_google')) : ?><a href="http://plus.google.com/<?php echo hick_option('hick_google'); ?>"><i class="icon-google-plus"></i></a><?php endif; ?>
					<?php if(hick_option('hick_instagram')) : ?><a href="http://instagram.com/<?php echo hick_option('hick_instagram'); ?>"><i class="icon-instagram"></i></a><?php endif; ?>
					<?php if(hick_option('hick_youtube')) : ?><a href="http://www.youtube.com/user/<?php echo hick_option('hick_youtube'); ?>"><i class="icon-youtube-play"></i></a><?php endif; ?>
					<?php if(hick_option('hick_tumblr')) : ?><a href="http://<?php echo hick_option('hick_tumblr'); ?>.tumblr.com"><i class="icon-tumblr"></i></a><?php endif; ?>
					<?php if(hick_option('hick_pinterest')) : ?><a href="http://pinterest.com/<?php echo hick_option('hick_pinterest'); ?>"><i class="icon-pinterest"></i></a><?php endif; ?>
					<?php if(hick_option('hick_linkedin')) : ?><a href="<?php echo hick_option('hick_linkedin'); ?>"><i class="icon-linkedin"></i></a><?php endif; ?>
					<?php if(hick_option('hick_soundcloud')) : ?><a href="http://soundcloud.com/<?php echo hick_option('hick_soundcloud'); ?>"><i class="icon-cloud"></i></a><?php endif; ?>
					<?php if(hick_option('hick_dribbble')) : ?><a href="http://dribbble.com/<?php echo hick_option('hick_dribbble'); ?>"><i class="icon-dribbble"></i></a><?php endif; ?>
					
				</div>
				<?php endif; ?>
				
			</div>
			
			<?php if(hick_option('hick_footer_widgets')) : ?>
			<div class="widget_area">
				
				<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 1') ) ?>
			
				<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 2') ) ?>
			
				<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 3') ) ?>
			
				<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 4') ) ?>
				
			</div>
			<?php endif; ?>
			
			<div class="footer_bottom">
				
				<?php if(hick_option('hick_footer_text')) : ?>
				<p class="left"><?php echo hick_kses(hick_option('hick_footer_text')); ?></p>
				<?php endif; ?>
				
				<?php if(hick_option('hick_footer_logo')) : ?>
				<p class="right"><img src="<?php echo hick_option('hick_footer_logo'); ?>" alt="" /></p>
				<?php endif; ?>
			</div>
			
		</div>
	
	</div>
	
	<?php wp_footer(); ?>
	<?php echo hick_kses(hick_option('hick_analytics')); ?>
</body>
</html>