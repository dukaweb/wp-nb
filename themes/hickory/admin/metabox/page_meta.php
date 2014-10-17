<?php

return array(
	'id'          => 'hickory_page',
	'types'       => array('page'),
	'title'       => 'Page Settings',
	'priority'    => 'high',
	'mode'        => WPALCHEMY_MODE_EXTRACT,
	'template'    => array(
		array(
			'type' => 'select',
			'name' => 'hickory_page_slider',
			'label' => 'Include Main Slider or Static Featured Posts on Page?',
			'description' => 'Select if you want either the main slider or static featured posts to appear on your page.',
			'items' => array(
				array(
					'value' => 'hickory_page_slider_none',
					'label' => 'None',
				),
				array(
					'value' => '1',
					'label' => 'Main Slider',
				),
				array(
					'value' => '2',
					'label' => 'Static Featured Posts',
				),
			),
			'default' => array(
				'hickory_page_slider_none',
			),
		),
		array(
			'type' => 'toggle',
			'name' => 'page_title',
			'label' => 'Disable Page Title',
			'description' => 'Check this box if you want to disable the page title.',
			'default' => 0
		),
		array(
			'type' => 'toggle',
			'name' => 'page_featured_img',
			'label' => 'Disable Page Featured Image',
			'description' => 'Check this box if you want to disable the page featured image.',
			'default' => 0
		),
		array(
			'type' => 'toggle',
			'name' => 'page_content',
			'label' => 'Disable Page Content',
			'description' => 'Check this box if you want to disable the page content.',
			'default' => 0
		),
		array(
			'type' => 'toggle',
			'name' => 'page_share',
			'label' => 'Disable Page Share',
			'description' => 'Check this box if you want to disable the page share box',
			'default' => 0
		),
	),
);

/**
 * EOF
 */