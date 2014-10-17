	<style type="text/css">
		
		<?php if(hick_option('hick_sticky_nav')) : ?>
			<?php if(hick_option('hick_header_layout') == 1) : ?>
			#navigation_bar, .mean-container .mean-bar {
				position:fixed;
				top: 0;
				width: 100%;
				z-index: 1000;
			}
			
			#header {
				margin-top:50px;
			}
			<?php endif; ?>
		<?php endif; ?>
		
		
		<?php if(hick_option('hick_logo_padding')) : ?>
			#header {
				padding:<?php echo hick_option('hick_logo_padding'); ?>px 20px;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_logo_position')) : ?>
			#header #logo {
				text-align:<?php echo hick_option('hick_logo_position'); ?>;
				<?php if(hick_option('hick_logo_position') == 'left') : ?>
				float:left;
				<?php endif; ?>
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_link')) : ?>
			a, #footer .widget p a, #footer .widget ul.side-newsfeed li h4 a, .post-author .author-info .author-connect span.connect-text, .post-entry blockquote p, .item span.category a, #footer .widget a:hover {
				color:<?php echo hick_option('hick_color_link'); ?>;
			}
			
			.item .item-image .review-box, .thecomment span.reply a.comment-reply-link, #respond #submit, .post-review .review-top .overall-score, .post-review .review-criteria .criteria .thescore, .flex-control-paging li a.flex-active, .content.sidebar ul.newsfeed.classic li .item .item-image .review-box, #sidebar .widget ul.side-newsfeed li .side-item .side-image .review-box {
				background:<?php echo hick_option('hick_color_link'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_link')) : ?>
			body {
				background-color:<?php echo hick_option('hick_color_background'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_background_image')) : ?>
			body {
				background-image:url(<?php echo hick_option('hick_background_image'); ?>);
				background-repeat:<?php echo hick_option('hick_background_repeat'); ?>;
				<?php if(hick_option('hick_background_fixed')) : ?>background-attachment:fixed;<?php endif; ?>
				background-position:<?php echo hick_option('hick_background_position'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_borders')) : ?>
			#wrapper {
				border-right:1px solid <?php echo hick_option('hick_color_borders'); ?>;
				border-left:1px solid <?php echo hick_option('hick_color_borders'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_navigation_bar')) : ?>
			#navigation_bar, .mean-container .mean-bar, .mean-container .mean-nav {
				background:<?php echo hick_option('hick_color_navigation_bar'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_navigation_link_color')) : ?>
			#navigation ul li a {
				color:<?php echo hick_option('hick_color_navigation_link_color'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_navigation_link_color_hover')) : ?>
			#navigation ul li a:hover {
				color:<?php echo hick_option('hick_color_navigation_link_color_hover'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_navigation_drop_color')) : ?>
			#navigation ul li ul li a {
				background:<?php echo hick_option('hick_color_navigation_drop_color'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_navigation_drop_color_hover')) : ?>
			#navigation ul li ul li a:hover {
				background:<?php echo hick_option('hick_color_navigation_drop_color_hover'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_navigation_drop_color_border')) : ?>
			#navigation ul li ul li a {
				border-color:<?php echo hick_option('hick_color_navigation_drop_color_border'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_navigation_drop_link')) : ?>
			#navigation ul li ul li a {
				color:<?php echo hick_option('hick_color_navigation_drop_link'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_navigation_drop_link_hover')) : ?>
			#navigation ul li ul li a:hover {
				color:<?php echo hick_option('hick_color_navigation_drop_link_hover'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_header')) : ?>
			#header {
				background:<?php echo hick_option('hick_color_header'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_newsfeed')) : ?>
			h2.content-heading {
				background:<?php echo hick_option('hick_color_newsfeed'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_newsfeed_text')) : ?>
			h2.content-heading, h2.content-heading span.thin, h2.content-heading a {
				color:<?php echo hick_option('hick_color_newsfeed_text'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_sidebar_headings')) : ?>
			#sidebar .widget h3.widget_title, #sidebar .widget .tabs-wrapper ul.tabs {
				background:<?php echo hick_option('hick_color_sidebar_headings'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_color_sidebar_headings_text')) : ?>
			#sidebar .widget h3.widget_title, #sidebar .widget .tabs-wrapper ul.tabs li.active a {
				color:<?php echo hick_option('hick_color_sidebar_headings_text'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_navigation_icon') == 0) : ?>
		#navigation ul li.menu-item-home{
			background:none;
			background-position:none;
			padding-left:0;
		}
		<?php endif; ?>
		
		<?php if(hick_option('hick_nav_font')) : ?>
			#navigation ul li a, .footer_navigation ul li a {
				font-family:"<?php echo hick_option('hick_nav_font'); ?>";
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_main_font')) : ?>
			body, #footer .widget .side_item h4, #respond textarea, .item span.category a, .post-header span.cat a, .post-header span.post-meta, .post-related ul li .related-item span.cat a, .thecomment span.author, #featured_area span.category a, .widget_slider .flexslider.homepage ul.slides li .feature_text span.category a {
				font-family:"<?php echo hick_option('hick_main_font'); ?>", sans-serif;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_headings_font')) : ?>
			h1, h2, h3, h4, h5, h6, .item h3 a, .post-header h1, .post-related h4 a, #sidebar .widget .tabs-wrapper ul.tabs li {
				font-family:"<?php echo hick_option('hick_headings_font'); ?>", sans-serif;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_slider_font')) : ?>
			#featured_area h2 a, .widget_slider .flexslider.homepage ul.slides li .feature_text h2 a {
				font-family:"<?php echo hick_option('hick_slider_font'); ?>", sans-serif;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_header_social_color')) : ?>
			#top_social i, #footer_social i {
				background:<?php echo hick_option('hick_header_social_color'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_header_social_color_icon')) : ?>
			#top_social i, #footer_social i {
				color:<?php echo hick_option('hick_header_social_color_icon'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_header_social_color_hover')) : ?>
			#top_social i:hover, #footer_social i:hover {
				background:<?php echo hick_option('hick_header_social_color_hover'); ?> !important;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_header_social_color_icon_hover')) : ?>
			#top_social i:hover, #footer_social i:hover {
				color:<?php echo hick_option('hick_header_social_color_icon_hover'); ?> !important;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_footer_bg')) : ?>
			#footer {
				background:<?php echo hick_option('hick_footer_bg'); ?>;
			}
			<?php if(hick_option('hick_footer_bg') == '#000000') : ?>.widget_area { background:url(<?php echo get_template_directory_uri(); ?>/img/footer-lines-dark.png) repeat-y center; }<?php endif; ?>
		<?php endif; ?>
		
		<?php if(hick_option('hick_footer_borders')) : ?>
			.container.footer, .footer_top, .widget_area {
				border-color:<?php echo hick_option('hick_footer_borders'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_footer_text_color')) : ?>
			#footer .widget, #footer .widget p, #footer .side-item-meta, .footer_bottom {
				color:<?php echo hick_option('hick_footer_text_color'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_footer_headings_color')) : ?>
			#footer .widget h3.widget_title {
				color:<?php echo hick_option('hick_footer_headings_color'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_footer_link_color')) : ?>
			#footer .widget a, #footer .widget p a, #footer .widget ul.side-newsfeed li h4 a, #footer .widget a:hover {
				color:<?php echo hick_option('hick_footer_link_color'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_footer_nav_color')) : ?>
			.footer_navigation ul li a {
				color:<?php echo hick_option('hick_footer_nav_color'); ?>;
			}
		<?php endif; ?>
		<?php if(hick_option('hick_footer_nav_color_hover')) : ?>
			.footer_navigation ul li a:hover {
				color:<?php echo hick_option('hick_footer_nav_color_hover'); ?>;
			}
		<?php endif; ?>
		
		<?php if(hick_option('hick_custom_css')) : ?>
			<?php echo hick_option('hick_custom_css'); ?>
		<?php endif; ?>
		
	</style>