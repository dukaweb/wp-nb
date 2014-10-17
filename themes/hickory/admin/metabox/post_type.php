<?php

return array(
	'id'          => 'hickory_post',
	'types'       => array('post'),
	'title'       => 'Post Type',
	'priority'    => 'high',
	'mode'        => WPALCHEMY_MODE_EXTRACT,
	'template'    => array(
		array(
			'type' => 'radioimage',
			'name' => 'hickory_post_type',
			'label' => 'Choose Type of Post',
			'description' => '',
			'items' => array(
				array(
					'value' => 'regular',
					'label' => 'Regular',
					'img' => HICKORY_ADMIN_URI . '/public/img/regular_post_icon.png',
				),
				array(
					'value' => 'video',
					'label' => 'Video',
					'img' => HICKORY_ADMIN_URI . '/public/img/video_post_icon.png',
				),
				array(
					'value' => 'gallery',
					'label' => 'Gallery',
					'img' => HICKORY_ADMIN_URI . '/public/img/gallery_post_icon.png',
				),
				array(
					'value' => 'review',
					'label' => 'Review',
					'img' => HICKORY_ADMIN_URI . '/public/img/review_post_icon.png',
				),
				array(
					'value' => 'music',
					'label' => 'Music',
					'img' => HICKORY_ADMIN_URI . '/public/img/music_post_icon.png',
				),
			),
			'default' => 'regular'
		),
		
		
		// video group
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'video',
			'title'     => 'Video Post',
			'dependency' => array(
				'field'    => 'hickory_post_type',
				'function' => 'hickory_post_type_is_video',
			),
			'fields'    => array(
				array(
					'type' => 'radiobutton',
					'name' => 'source',
					'label' => 'Video Source',
					'items' => array(
						array(
							'value' => 'embed',
							'label' => 'Embed Video',
						),
						array(
							'value' => 'self_hosted',
							'label' => 'Self Hosted Video',
						)
					)
				),
				// embed
				array(
					'type' => 'textbox',
					'name' => 'embed_url',
					'description' => 'If you are using a youtube video: insert the 11 long mixture of letters and numbers (e.g. v=<strong><u>EfTlbB6JCD8</u></strong>) which you will find in the youtube video url.<br />If you are using Vimeo, insert the number you see in the vimeo video url (e.g. <strong><u>68548877</u></strong>)',
					'label' => 'Video key',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_video_is_embed',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'embed_height',
					'label' => 'Video Height',
					'description' => 'Enter height of video (pixels)',
					'default' => '420',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_video_is_embed',
					),
				),
				// self hosted
				array(
					'type' => 'upload',
					'name' => 'self_hosted_url',
					'label' => 'Video URL',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_video_is_self_hosted',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'self_hosted_height',
					'label' => 'Video Height',
					'default' => '420',
					'description' => 'Enter height of video (pixels)',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_video_is_self_hosted',
					),
				),
			),
		),
		// gallery group
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'gallery',
			'title'     => 'Gallery Post',
			'dependency' => array(
				'field'    => 'hickory_post_type',
				'function' => 'hickory_post_type_is_gallery',
			),
			
			'fields'    => array(
				array(
					'type'      => 'group',
					'repeating' => true,
					'name'      => 'images',
					'title'     => 'Image',
					'fields'    => array(
						array(
							'type'      => 'upload',
							'name'      => 'image',
							'label'     => 'Add Image',
						),
						array(
							'type'      => 'textbox',
							'name'      => 'caption',
							'label'     => 'Image Caption',
						),
					),
				),
			),
		),
		// review group
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'review',
			'title'     => 'Review Post',
			'dependency' => array(
				'field'    => 'hickory_post_type',
				'function' => 'hickory_post_type_is_review',
			),
			'fields'    => array(
				array(
					'type'      => 'slider',
					'name'      => 'overall_score',
					'label'     => 'Overal Score',
					'min'       => 0,
					'max'       => 10,
					'step'      => 0.5,
				),
				array(
					'type'      => 'textbox',
					'name'      => 'review_heading',
					'label'     => 'Review Heading',
					'description' => 'Short review heading (e.g. Excellent!)',
				),
				array(
					'type'      => 'textarea',
					'name'      => 'summary_text',
					'label'     => 'Summary Text',
				),
				array(
					'type'      => 'group',
					'repeating' => true,
					'name'      => 'criteria',
					'title'     => 'Review Criterias',
					'fields'    => array(
						array(
							'type'      => 'textbox',
							'name'      => 'name',
							'label'     => 'Name',
						),
						array(
							'type'      => 'slider',
							'name'      => 'score',
							'label'     => 'Score',
							'min'       => 0,
							'max'       => 10,
							'step'      => 0.5,
						),
					),
				),
			),
		),
		
		// music group
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'music',
			'title'     => 'Music Post',
			'dependency' => array(
				'field'    => 'hickory_post_type',
				'function' => 'hickory_post_type_is_music',
			),
			'fields'    => array(
				array(
					'type' => 'radiobutton',
					'name' => 'source',
					'label' => 'Music Source',
					'items' => array(
						array(
							'value' => 'embed',
							'label' => 'Music from Youtube & Vimeo',
						),
						array(
							'value' => 'soundcloud',
							'label' => 'Music from Soundcloud',
						),
						array(
							'value' => 'spotify',
							'label' => 'Music from Spotify',
						)
					)
				),
				// embed
				array(
					'type' => 'textbox',
					'name' => 'embed_url',
					'description' => 'If you are using a youtube video: insert the 11 long mixture of letters and numbers (e.g. v=<strong><u>EfTlbB6JCD8</u></strong>) which you will find in the youtube video url.<br />If you are using Vimeo, insert the number you see in the vimeo video url (e.g. <strong><u>68548877</u></strong>)',
					'label' => 'Video key',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_video_is_embed',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'embed_height',
					'label' => 'Video Height',
					'description' => 'Enter height of video (pixels)',
					'default' => '420',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_video_is_embed',
					),
				),
				//soundcloud
				array(
					'type' => 'textarea',
					'name' => 'soundcloud_embed',
					'description' => 'Insert full Soundcloud embed code.',
					'label' => 'Soundcloud embed code',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_music_is_soundcloud',
					),
				),
				array(
					'type' => 'toggle',
					'name' => 'soundcloud_include_featured_image',
					'label' => 'Include Featured Image',
					'description' => 'Check this box if you want to show the featured image together with the soundcloud widget',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_music_is_soundcloud',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'spotify_embed',
					'description' => 'To get the Spotify Song URI go to <strong>Spotify</strong> > Right click on the song you want to embed > Click <strong>Copy Spotify URI</strong> > Paste code in this field.)',
					'label' => 'Spotify Song URI',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_music_is_spotify',
					),
				),
				array(
					'type' => 'toggle',
					'name' => 'spotify_include_featured_image',
					'label' => 'Include Featured Image',
					'description' => 'Check this box if you want to show the featured image together with the soundcloud widget',
					'dependency' => array(
						'field'    => 'source',
						'function' => 'hickory_post_music_is_spotify',
					),
				),
			),
		),
		
		array(
			'type' => 'radiobutton',
			'name' => 'image_size',
			'label' => 'Featured Image, Video, Gallery or Music Size',
			'description' => 'Remember if you choose Full Width Size you will need to use big images. Gallery images needs to be at least 620x420px if Normal Size is chosen and 940x520px if Full Width Size is chosen.',
			'default' => 'normal',
			'items' => array(
				array(
					'value' => 'normal',
					'label' => 'Normal Size',
				),
				array(
					'value' => 'full',
					'label' => 'Full Width Size',
				)
			)
		),
		array(
			'type' => 'radiobutton',
			'name' => 'post_size',
			'label' => 'Post w/ sidebar or Full width',
			'description' => 'If you choose full width post your featured image, video or gallery will automatically become full width as well.',
			'default' => 'normal_post',
			'items' => array(
				array(
					'value' => 'normal_post',
					'label' => 'Post w/ Sidebar',
				),
				array(
					'value' => 'full_post',
					'label' => 'Full Width Post',
				)
			)
		),
		array(
			'type' => 'toggle',
			'name' => 'is_featured',
			'label' => 'Featured Post?',
			'description' => 'Check this box if you want to add this post to the featured posts. Once you have checked the box, head over to the Theme Options > Homepage Options and add the post to the slider or featured area.',
		),
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'featured_data',
			'title'     => 'Featured Data',
			'dependency' => array(
				'field'    => 'is_featured',
				'function' => 'hickory_post_is_featured',
			),
			'fields'    => array(
				array(
					'type' => 'upload',
					'name' => 'custom_image',
					'label' => 'Custom Image',
					'description' => 'If you leave this blank the theme will use the featured image you chose for the post',
				),
				array(
					'type' => 'textbox',
					'name' => 'custom_title',
					'label' => 'Custom Title',
					'description' => 'If you leave this blank the theme will use the post title you gave this post',
				),
			),
		),
		array(
			'type' => 'toggle',
			'name' => 'show_featured_image',
			'label' => 'Disable Featured Image, Video, Gallery or Music',
			'description' => '',
			'default' => '0'
		),
		array(
			'type' => 'toggle',
			'name' => 'show_tags',
			'label' => 'Disable Tags',
			'description' => '',
			'default' => '0'
		),
		array(
			'type' => 'toggle',
			'name' => 'show_share_buttons',
			'label' => 'Disable Share Buttons',
			'description' => '',
			'default' => '0'
		),
		array(
			'type' => 'toggle',
			'name' => 'show_author_box',
			'label' => 'Disable Author Box',
			'description' => '',
			'default' => '0'
		),
		array(
			'type' => 'toggle',
			'name' => 'show_related_posts',
			'label' => 'Disable Related Posts',
			'description' => '',
			'default' => '0'
		),
	),
);

/**
 * EOF
 */