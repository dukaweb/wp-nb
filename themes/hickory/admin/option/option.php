<?php

return array(
	'title' => 'Hickory Theme Options',
	'page' => 'Hickory Theme Options',
	'logo' => '',
	'menus' => array(
		array(
			'title' => 'General Options',
			'name' => 'menu_1',
			'icon' => 'font-awesome:icon-gear',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => 'General Options',
					'fields' => array(
						array(
							'type' => 'upload',
							'name' => 'hick_favicon',
							'label' => 'Favicon Upload',
							'description' => 'Upload your Favicon',
							'default' => '',
						),
						array(
							'type' => 'select',
							'name' => 'hickory_archive_layout',
							'label' => 'Select Archive Layout',
							'description' => 'Select what kind of archive layout you prefer',
							'items' => array(
								array(
									'value' => 'hickory_archive_grid',
									'label' => 'Grid Layout',
								),
								array(
									'value' => 'hickory_archive_list',
									'label' => 'List Layout',
								),
							),
							'default' => array(
								'hickory_archive_grid',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'hick_responsive',
							'label' => 'Responsive Design',
							'description' => 'Enable/Disable responsive design',
							'default' => '1',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'hick_analytics',
							'label' => 'Analytics Code',
							'description' => 'Enter your Analytics code eg. from Google Analytics',
							'theme' => 'twilight',
							'mode' => 'html',
						),
					),
				),
			),
		),
		array(
			'title' => 'Logo and Header',
			'name' => 'menu_2',
			'icon' => 'font-awesome:icon-adn',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => 'Logo Options',
					'fields' => array(
						array(
							'type' => 'upload',
							'name' => 'hick_logo',
							'label' => 'Upload Logo',
							'description' => 'Upload your logo. Max width is 940px.',
							'default' => '',
						),
						array(
							'type' => 'slider',
							'name' => 'hick_logo_padding',
							'label' => 'Logo Padding',
							'description' => 'Enter how much top and bottom padding you want in the header. The more padding you add the more space there will be around your logo.',
							'min' => '1',
							'max' => '200',
							'step' => '1',
							'default' => '50',
						),
						array(
							'type' => 'radiobutton',
							'name' => 'hick_logo_position',
							'description' => 'Choose a position for your logo',
							'label' => 'Logo Position',
							'items' => array(
								array(
									'value' => 'center',
									'label' => 'Center',
								),
								array(
									'value' => 'left',
									'label' => 'Left',
								),
							),
							'default' => array(
								'center',
							),
						),
						array(
							'type' => 'codeeditor',
							'name' => 'hick_header_ad',
							'label' => 'Header Banner',
							'description' => 'Enter your header banner code here. <strong>NOTE:</strong> You should position your logo to the left if you insert a banner',
							'default' => '',
							'theme' => 'twilight',
							'mode' => 'html',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => 'Header Options',
					'fields' => array(
						array(
							'type' => 'radioimage',
							'name' => 'hick_header_layout',
							'label' => 'Choose Header Layout',
							'description' => 'RadioImage with unspecified item max height and item max width',
							'items' => array(
								array(
									'value' => '1',
									'label' => 'Navigation Above Logo',
									'img' => HICKORY_ADMIN_URI . '/public/img/header_layout1.png',
								),
								array(
									'value' => '2',
									'label' => 'Navigation Below Logo',
									'img' => HICKORY_ADMIN_URI . '/public/img/header_layout2.png',
								),
								array(
									'value' => '3',
									'label' => 'Full Width Header with Navigation below',
									'img' => HICKORY_ADMIN_URI . '/public/img/header_layout3.png',
								),
							),
							'default' => array(
								'1',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'hick_sticky_nav',
							'label' => 'Sticky Navigation Bar',
							'description' => 'Enable/Disable Sticky navigation bar. <strong>NOTE:</strong> Only works with Header Layout 1 (Navigation above logo)',
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'hick_search_nav',
							'label' => 'Search in Header',
							'description' => 'Enable/Disable search bar in header',
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'hick_navigation_icon',
							'label' => 'Navigation Home Icon',
							'description' => 'Display the little home icon next to the Home link',
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'hick_header_social',
							'label' => 'Header Social Icons',
							'description' => 'Remember to set your social media URLs in the Social Media options tab.',
							'default' => '1',
						),
						array(
							'type' => 'color',
							'name' => 'hick_header_social_color',
							'label' => 'Social Icon background color',
							'description' => 'Choose a background color for your social icons',
							'default' => '#FFFFFF',
						),
						array(
							'type' => 'color',
							'name' => 'hick_header_social_color_icon',
							'label' => 'Social Icon color',
							'description' => 'Choose a color for your social icons',
							'default' => '#000000',
						),
						array(
							'type' => 'color',
							'name' => 'hick_header_social_color_hover',
							'label' => 'Custom Social Icon hover background color',
							'description' => 'Choose a custom hover background color for all of your social icons. Leave this blank if you want to use the current social hover colors.',
							'default' => '',
						),
						array(
							'type' => 'color',
							'name' => 'hick_header_social_color_icon_hover',
							'label' => 'Custom Social Icon hover color',
							'description' => 'Choose a custom hover color for all of your social icons. Leave this blank if you want to use the current social hover colors.',
							'default' => '',
						),
					),
				),
			),
		),
		array(
			'title' => 'Social Media Options',
			'name' => 'menu_3',
			'icon' => 'font-awesome:icon-twitter',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => 'Social Media Pages',
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'hick_facebook',
							'label' => 'Facebook username',
							'description' => 'Your Facebook username or page name',
							'default' => 'SoloPineDesigns',
						),
						array(
							'type' => 'textbox',
							'name' => 'hick_twitter',
							'label' => 'Twitter username',
							'description' => 'Your Twitter username',
							'default' => 'SoloPineDesigns',
						),
						array(
							'type' => 'textbox',
							'name' => 'hick_google',
							'label' => 'Google Plus username',
							'description' => 'Your Google Plus username. Usually a long string of numbers.',
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'hick_instagram',
							'label' => 'Instagram username',
							'description' => 'Your Instagram username',
							'default' => 'solopine',
						),
						array(
							'type' => 'textbox',
							'name' => 'hick_tumblr',
							'label' => 'Tumblr username',
							'description' => 'Your Tumblr username',
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'hick_youtube',
							'label' => 'Youtube username',
							'description' => 'Your Youtube username',
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'hick_pinterest',
							'label' => 'Pinterest username',
							'description' => 'Your pinterest username',
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'hick_linkedin',
							'label' => 'Linkedin full URL',
							'description' => '<strong>Full URL</strong> to your linkedin profile',
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'hick_soundcloud',
							'label' => 'Soundcloud username',
							'description' => 'Your Soundcloud username',
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'hick_dribbble',
							'label' => 'Dribbble username',
							'description' => 'Your Dribbble username',
							'default' => '',
						),
					),
				),
			),
		),
		array(
			'title' => 'Homepage Options',
			'name' => 'menu_4',
			'icon' => 'font-awesome:icon-home',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => 'Homepage Options',
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'hickory_homepage_layout',
							'label' => 'Select Homepage Layout',
							'description' => '<b>Grid Layout</b> will pull in all your latest posts in a grid view. <b>List Layout</b> will pull in all your latest posts in a list view. If you choose the <b>Widgetized Homepage Layout</b> then go to Appearance > Widgets and use the Homepage Widget to create a custom homepage layout.',
							'items' => array(
								array(
									'value' => 'hickory_classic',
									'label' => 'Grid Layout',
								),
								array(
									'value' => 'hickory_list',
									'label' => 'List Layout',
								),
								array(
									'value' => 'hickory_widgets',
									'label' => 'Widgetized Homepage Layout',
								),
							),
							'default' => array(
								'hickory_classic',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'hick_homepage_sidebar',
							'label' => 'Homepage Sidebar',
							'description' => 'Display the sidebar on homepage.',
							'default' => '0',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => 'Featured Area Options',
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'hick_featured_toggle',
							'label' => 'Display Featured Area',
							'description' => 'Display the featured area on the homepage',
							'default' => '0',
						),
						array(
							'type' => 'radioimage',
							'name' => 'hick_featured_layout',
							'label' => 'Choose Featured Area Layout',
							'description' => 'RadioImage with unspecified item max height and item max width',
							'items' => array(
								array(
									'value' => '1',
									'label' => 'Featured Area w/ 3 Posts',
									'img' => HICKORY_ADMIN_URI . '/public/img/featured1.png',
								),
								array(
									'value' => '2',
									'label' => 'Slider w/ 5 Posts',
									'img' => HICKORY_ADMIN_URI . '/public/img/featured2.png',
								),
							),
							'default' => array(
								'1',
							),
						),
						array(
							'type' => 'sorter',
							'max_selection' => 3,
							'name' => 'hick_featured_layout1_data',
							'label' => 'Posts',
							'description' => 'Display the featured area on the homepage',
							'items'=> array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'hickory_get_featured_posts'
									)
								)
							),
							'dependency' => array(
								'field' => 'hick_featured_layout',
								'function' => 'hickory_option_is_layout_1'
							),
						),
						array(
							'type' => 'sorter',
							'max_selection' => 5,
							'name' => 'hick_featured_layout2_data',
							'label' => 'Posts',
							'description' => 'Display the featured area on the homepage',
							'items'=> array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'hickory_get_featured_posts'
									)
								)
							),
							'dependency' => array(
								'field' => 'hick_featured_layout',
								'function' => 'hickory_option_is_layout_2'
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'hick_exclude_posts',
							'label' => 'Exclude featured posts from latest posts loop',
							'description' => 'Set this to on if you want to exclude your featured posts in the latest posts loop',
							'default' => '0',
						),
					),
				),
			),
		),
		array(
			'title' => 'Widgetize Pages and Categories',
			'name' => 'menu_5',
			'icon' => 'font-awesome:icon-edit',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => 'Widgetize your pages and categories',
					'fields' => array(
						array(
							'type' => 'multiselect',
							'name' => 'hick_widgets_categories',
							'label' => __('Categories', 'vp_textdomain'),
							'description' => __('Choose which categories you want to widgetize', 'vp_textdomain'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_categories',
									),
								),
							),
						),
						array(
							'type' => 'multiselect',
							'name' => 'hick_widgets_pages',
							'label' => __('Pages', 'vp_textdomain'),
							'description' => __('Choose which pages you want to widgetize', 'vp_textdomain'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_pages',
									),
								),
							),
						),
					),
				),
			),
		),
		array(
			'title' => 'Footer Options',
			'name' => 'menu_6',
			'icon' => 'font-awesome:icon-collapse',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => 'Footer options',
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'hick_footer_widgets',
							'label' => 'Footer Widgets',
							'description' => 'Enable or Disable the footer widget area',
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'hick_footer_social',
							'label' => 'Footer Social Icons',
							'description' => 'Hide or show the footer icons',
							'default' => '1',
						),
					
						array(
							'type' => 'codeeditor',
							'name' => 'hick_footer_text',
							'label' => 'Footer Bottom Text',
							'description' => 'Enter your copyright text or whatever you want right here.',
							'default' => '&copy; 2013 Solo Pine Designs, Inc. All rights reserved.',
							'theme' => 'twilight',
							'mode' => 'html',
						),
						array(
							'type' => 'upload',
							'name' => 'hick_footer_logo',
							'label' => 'Upload Footer Logo',
							'description' => 'Upload your footer logo',
							'default' => '',
						),
					),
				),
			),
		),
		array(
			'title' => 'Appearance Options',
			'name' => 'menu_7',
			'icon' => 'font-awesome:icon-edit',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => 'General Appearance',
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'hick_color_link',
							'label' => 'Main link Color',
							'description' => 'Choose the main link color',
							'default' => '#ff502e',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_background',
							'label' => 'Background Color',
							'description' => 'Choose the background color',
							'default' => '#f2f2f2',
						),
						array(
							'type' => 'upload',
							'name' => 'hick_background_image',
							'label' => 'Background Image',
							'description' => 'Upload a background image',
							'default' => '',
						),
						array(
							'type' => 'select',
							'name' => 'hick_background_repeat',
							'label' => 'Background Repeat',
							'items' => array(
								array(
									'value' => 'repeat',
									'label' => 'Repeat',
								),
								array(
									'value' => 'no-repeat',
									'label' => 'No Repeat',
								),
								array(
									'value' => 'repeat-x',
									'label' => 'Repeat X',
								),
								array(
									'value' => 'repeat-y',
									'label' => 'Repeat Y',
								),
							),
							'default' => array(
								'repeat',
							),
						),
						array(
							'type' => 'select',
							'name' => 'hick_background_position',
							'label' => 'Background Position',
							'items' => array(
								array(
									'value' => 'left top',
									'label' => 'Left Top',
								),
								array(
									'value' => 'left center',
									'label' => 'Left Center',
								),
								array(
									'value' => 'left bottom',
									'label' => 'Left Bottom',
								),
								array(
									'value' => 'center top',
									'label' => 'Center Top',
								),
								array(
									'value' => 'center center',
									'label' => 'Center Center',
								),
								array(
									'value' => 'center bottom',
									'label' => 'Center Bottom',
								),
								array(
									'value' => 'right top',
									'label' => 'Right top',
								),
								array(
									'value' => 'right center',
									'label' => 'Right Center',
								),
								array(
									'value' => 'right bottom',
									'label' => 'Right Bottom',
								),
							),
							'default' => array(
								'left top',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'hick_background_fixed',
							'label' => 'Fixed Background Image?',
							'description' => 'The background is fixed with regard to the viewport.',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_borders',
							'label' => 'Border Color',
							'description' => 'Choose color of the border around your content',
							'default' => '#e5e5e5',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => 'Navigation Appearance',
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'hick_color_navigation_bar',
							'label' => 'Navigation Bar Color',
							'description' => 'Choose the color of your navigation bar',
							'default' => '#000000',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_navigation_link_color',
							'label' => 'Navigation Link Color',
							'description' => 'Choose the color of your navigation links',
							'default' => '#ffffff',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_navigation_link_color_hover',
							'label' => 'Navigation Link Hover Color',
							'description' => 'Choose the color of your navigation links',
							'default' => '#999999',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_navigation_drop_color',
							'label' => 'Navigation Dropdown Color',
							'description' => 'Choose the color of your dropdown',
							'default' => '#000000',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_navigation_drop_color_hover',
							'label' => 'Navigation Dropdown Hover Color',
							'description' => 'Choose the hover color of your dropdown',
							'default' => '#444444',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_navigation_drop_color_border',
							'label' => 'Navigation Dropdown Border Color',
							'description' => 'Choose the color of your dropdown borders',
							'default' => '#444444',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_navigation_drop_link',
							'label' => 'Navigation Dropdown Link Color',
							'description' => 'Choose the color of your dropdown links',
							'default' => '#aaaaaa',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_navigation_drop_link_hover',
							'label' => 'Navigation Dropdown Link Hover Color',
							'description' => 'Choose the hover color of your dropdown links',
							'default' => '#ffffff',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => 'Header Appearance',
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'hick_color_header',
							'label' => 'Header Background Color',
							'description' => 'Choose the color of your header background',
							'default' => '#ffffff',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => 'Main Content Appearance',
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'hick_color_newsfeed',
							'label' => 'Main Headings Color',
							'description' => 'Choose the color of your main headings. These are the headings that shows up on the homepage for example, showing the name of the category or saying "Latest Posts"',
							'default' => '#000000',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_newsfeed_text',
							'label' => 'Main Headings Text Color',
							'description' => 'Choose the color of your main headings text',
							'default' => '#ffffff',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => 'Sidebar Appearance',
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'hick_color_sidebar_headings',
							'label' => 'Sidebar Headings Color',
							'description' => 'Choose the color of your sidebar headings.',
							'default' => '#ff502e',
						),
						array(
							'type' => 'color',
							'name' => 'hick_color_sidebar_headings_text',
							'label' => 'Sidebar Headings Text Color',
							'description' => 'Choose the color of your sidebar headings text',
							'default' => '#ffffff',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => 'Footer Appearance',
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'hick_footer_bg',
							'label' => 'Footer Background Color',
							'description' => 'Choose the background color for the footer',
							'default' => '#000000',
						),
						array(
							'type' => 'color',
							'name' => 'hick_footer_borders',
							'label' => 'Footer borders color',
							'description' => 'Choose the color you want for the borders in the footer',
							'default' => '#333333',
						),
						array(
							'type' => 'color',
							'name' => 'hick_footer_text_color',
							'label' => 'Footer Text Color',
							'description' => 'Choose the footer text color',
							'default' => '#888888',
						),
						array(
							'type' => 'color',
							'name' => 'hick_footer_headings_color',
							'label' => 'Footer Widget Headings Color',
							'description' => 'Choose the footer widget headings color',
							'default' => '#FFFFFF',
						),
						array(
							'type' => 'color',
							'name' => 'hick_footer_link_color',
							'label' => 'Footer Link Color',
							'description' => 'Choose the footer link color',
							'default' => '#ff502e',
						),
						array(
							'type' => 'color',
							'name' => 'hick_footer_nav_color',
							'label' => 'Footer Navigation Link Color',
							'description' => 'Choose the footer navigation link color',
							'default' => '#FFFFFF',
						),
						array(
							'type' => 'color',
							'name' => 'hick_footer_nav_color_hover',
							'label' => 'Footer Navigation Link Hover Color',
							'description' => 'Choose the footer navigation hover link color',
							'default' => '#999999',
						),
					),
				),
			),
		),
		array(
			'title' => 'Fonts Options',
			'name' => 'menu_8',
			'icon' => 'font-awesome:icon-edit',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => 'Navigation Font',
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'hick_nav_font',
							'label' => 'Navigation Font',
							'description' => 'Font for navigation',
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
						),
						array(
							'type' => 'select',
							'name' => 'hick_main_font',
							'label' => 'Main Font',
							'description' => 'Font for content text and widget text',
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
						),
						array(
							'type' => 'select',
							'name' => 'hick_headings_font',
							'label' => 'Headings Font',
							'description' => 'Font for headings and category text',
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
						),
						array(
							'type' => 'select',
							'name' => 'hick_slider_font',
							'label' => 'Slider Headings Font',
							'description' => 'Font for slider headings',
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
						),
					),
				),
			),
		),
		array(
			'title' => 'Custom CSS',
			'name' => 'menu_9',
			'icon' => 'font-awesome:icon-css3',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => 'Custom CSS',
					'fields' => array(
						array(
							'type' => 'codeeditor',
							'name' => 'hick_custom_css',
							'label' => 'Custom CSS',
							'description' => 'Write your custom CSS here',
							'theme' => 'github',
							'mode' => 'css',
						),
					),
				),
			),
		),
	)
);

/**
 *EOF
 */