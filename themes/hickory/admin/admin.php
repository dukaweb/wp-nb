<?php

define('HICKORY_ADMIN', get_template_directory() . '/admin');
define('HICKORY_ADMIN_URI', get_template_directory_uri() . '/admin');

// require VafPress
require_once get_template_directory() . '/vafpress-framework/bootstrap.php';

// require data source
require_once 'source.php';

// load metaboxes scripts and styles dependencies
$post_type_metabox  = HICKORY_ADMIN . '/metabox/post_type.php';
$page_meta_metabox  = HICKORY_ADMIN . '/metabox/page_meta.php';
$theme_options      = HICKORY_ADMIN . '/option/option.php';

$theme_options_obj = new VP_Option(array(
	'option_key' => 'hick_option',
	'page_slug'  => 'hick_option',
	'template'   => $theme_options,
	'menu_page'  => 'themes.php',
	'page_title' => 'Hickory Options',
	'menu_label' => 'Hickory Options',
));

$post_type_metabox_obj = new VP_Metabox($post_type_metabox);
$page_meta_metabox_obj = new VP_Metabox($page_meta_metabox);

function hick_option( $key )
{
    return vp_option( "hick_option." . $key );
}

/*
 * EOF
 */