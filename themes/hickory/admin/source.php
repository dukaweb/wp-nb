<?php

function hickory_post_type_is_regular($type)
{
	if( $type === 'regular' )
		return true;
	return false;
}

function hickory_post_type_is_video($type)
{
	if( $type === 'video' )
		return true;
	return false;
}

function hickory_post_type_is_gallery($type)
{
	if( $type === 'gallery' )
		return true;
	return false;
}

function hickory_post_type_is_review($type)
{
	if( $type === 'review' )
		return true;
	return false;
}

function hickory_post_type_is_music($type)
{
	if( $type === 'music' )
		return true;
	return false;
}


function hickory_post_is_featured($is_featured)
{
	if( $is_featured )
		return true;
	return false;
}

function hickory_post_video_is_embed($type)
{
	if( $type === 'embed' )
		return true;
	return false;
}

function hickory_post_video_is_self_hosted($type)
{
	if( $type === 'self_hosted' )
		return true;
	return false;
}

function hickory_post_music_is_soundcloud($type)
{
	if( $type === 'soundcloud' )
		return true;
	return false;
}
function hickory_post_music_is_spotify($type)
{
	if( $type === 'spotify' )
		return true;
	return false;
}

function hickory_option_is_layout_1($type)
{
	if( $type == '1' )
		return true;
	return false;
}

function hickory_option_is_layout_2($type)
{
	if( $type == '2' )
		return true;
	return false;
}

function hickory_get_featured_posts()
{
	$query = new WP_Query( array( 'meta_key' => 'is_featured', 'meta_value' => 1 ) );
	$data  = array();
	foreach ($query->posts as $post)
	{
		$data[] = array(
			'value' => $post->ID,
			'label' => $post->post_title,
		);
	}
	return $data;
}

/**
 * EOF
 */