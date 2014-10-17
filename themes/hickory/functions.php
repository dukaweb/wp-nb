<?php
/** 
 * Register & enqueue styles/scripts 
 * @since 1.3
 */
if(!is_admin()) add_action('init', 'hick_register_scripts');
function hick_register_scripts() {

	// Stylesheets
	wp_register_style('style', get_stylesheet_directory_uri() . '/style.css');
	wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_register_style('font-awesome', '//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');
	

	//Scripts
	wp_register_script('hickory', get_template_directory_uri() . '/js/hickory.js', 'jquery', '', true);
	wp_register_script('pinit', '//assets.pinterest.com/js/pinit.js', '', '', true);
	wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', 'jquery', '', true);
	wp_register_script('colorbox', get_template_directory_uri() . '/js/jquery.colorbox-min.js', 'jquery', '', true);
	wp_register_script('meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', 'jquery', '', true);

}

if(!is_admin()) add_action('wp_enqueue_scripts', 'hick_enqueue_scripts');
function hick_enqueue_scripts() {

	wp_enqueue_style('style');

	if(hick_option('hick_responsive')) {
		wp_enqueue_style('responsive');
		wp_enqueue_script('meanmenu');
	}
	
	wp_enqueue_style('font-awesome');
	
	wp_enqueue_style('default_nav_font', 'http://fonts.googleapis.com/css?family=Lato:400,700');
	wp_enqueue_style('default_headings_font', 'http://fonts.googleapis.com/css?family=Roboto:400,100,300,700');
	wp_enqueue_style('default_body_font', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700');

	
	wp_enqueue_script('jquery');
	wp_enqueue_script('hickory');
	wp_enqueue_script('pinit');
	wp_enqueue_script('flexslider');
	wp_enqueue_script('colorbox');

	$localize = array(
		'is_home' => is_home(),
		'is_single' => is_single()
	);
	wp_localize_script( 'hickory', 'hick', $localize );
	
	if (is_singular() && get_option('thread_comments'))	wp_enqueue_script('comment-reply');

}

function hickory_custom_css() {
    return get_template_part('inc/customization');
}
add_action( 'wp_head', 'hickory_custom_css' );

/*** Other essensials ***/
if ( ! isset( $content_width ) )
	$content_width = 620;
	
add_theme_support( 'automatic-feed-links' );

//////////////////////////////////////////////////////////////////
// Translation
//////////////////////////////////////////////////////////////////
add_action('after_setup_theme', 'hick_theme_setup');
function hick_theme_setup(){
    load_theme_textdomain('hickory', get_template_directory() . '/lang');
}
	
//////////////////////////////////////////////////////////////////
// Bootstrap Theme Options and Metaboxes
//////////////////////////////////////////////////////////////////
require_once 'admin/admin.php';

//////////////////////////////////////////////////////////////////
// Register WordPress 3 menus
//////////////////////////////////////////////////////////////////
add_action( 'init', 'hick_register_my_menus' );

function hick_register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => 'Primary Menu',
			'footer-menu' => 'Footer Menu'
		)
	);
}

//////////////////////////////////////////////////////////////////
// Post thumbnails
//////////////////////////////////////////////////////////////////
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 620, 0, true );
	add_image_size( 'newsfeed', 300, 300, true );
	add_image_size( 'related', 192, 128, true );
	add_image_size( 'feature_big', 620, 420, true );
	add_image_size( 'feature_small', 300, 200, true );
	add_image_size( 'side_item_thumb', 100, 70, true );
	add_image_size( 'slider_thumb', 940, 520, true );
	add_image_size( 'full_thumb', 940, 0, true );
	add_image_size( 'list_thumb', 230, 150, true );
	add_image_size( 'list_thumb_big', 340, 210, true );
}

//////////////////////////////////////////////////////////////////
// Register sidebar and footer widgets
//////////////////////////////////////////////////////////////////
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Main Widget Area',
		'before_widget' => '<div class="homepage_widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="content-heading">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'Sidebar Area',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer 1',
		'before_widget' => '<div class="widget first">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer 2',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer 3',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer 4',
		'before_widget' => '<div class="widget last">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3>',
	));
}
 
//////////////////////////////////////////////////////////////////
// Include widgets
//////////////////////////////////////////////////////////////////
include("inc/widgets/homepage_widget.php");
include("inc/widgets/homepage_slider_widget.php");
include("inc/widgets/homepage_3col_widget.php");
include("inc/widgets/homepage_ad_widget.php");
include("inc/widgets/latest_post_widget.php");
include("inc/widgets/facebook_widget.php");
include("inc/widgets/tabs_widget.php");
include("inc/widgets/social_widget.php");
include("inc/widgets/review_widget.php");

//////////////////////////////////////////////////////////////////
// Aq Resizer
//////////////////////////////////////////////////////////////////
require_once('inc/aq_resizer.php');

//////////////////////////////////////////////////////////////////
// COMMENTS LAYOUT
//////////////////////////////////////////////////////////////////

	function hickory_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

			<div class="thecomment">
				
				<div class="avatar">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="comment-content">
				
					<div class="comment-meta">
						<span class="author"><?php echo get_comment_author_link(); ?> <span class="says"><?php _e('says:', 'hickory'); ?></span></span>
						<span class="date"><?php printf(__('%1$s at %2$s', 'hickory'), get_comment_date(),  get_comment_time()) ?></span>
					</div>
					
					<div class="comment-text">
						
						<?php if ($comment->comment_approved == '0') : ?>
							<em><?php _e('Comment awaiting approval', 'hickory'); ?></em>
							<br />
						<?php endif; ?>

						<?php comment_text(); ?>
						
					</div>
					
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'hickory'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
						<?php edit_comment_link(__('Edit', 'hickory')); ?>
					</span>
				
				</div>
				
			</div>
		</li>

		<?php 
	}
	
//////////////////////////////////////////////////////////////////
// REVIEW SCORE
//////////////////////////////////////////////////////////////////

function hickory_criteria($thescore) {

	if(($thescore) == 0) {		
		echo '0';		
	} elseif(($thescore) == 0.5) {		
		echo '5';		
	} elseif(($thescore) == 1) {		
		echo '10';		
	} elseif(($thescore) == 1.5) {	
		echo '15';		
	} elseif(($thescore) == 2) {		
		echo '20';		
	} elseif(($thescore) == 2.5) {	
		echo '25';	
	} elseif(($thescore) == 3) {		
		echo '30';		
	} elseif(($thescore) == 3.5) {
		echo '35';
	} elseif(($thescore) == 4) {
		echo '40';
	} elseif(($thescore) == 4.5) {
		echo '45';
	} elseif(($thescore) == 5) {
		echo '50';
	} elseif(($thescore) == 5.5) {
		echo '55';
	} elseif(($thescore) == 6) {
		echo '60';
	} elseif(($thescore) == 6.5) {
		echo '65';
	} elseif(($thescore) == 7) {
		echo '70';
	} elseif(($thescore) == 7.5) {
		echo '75';
	} elseif(($thescore) == 8) {
		echo '80';
	} elseif(($thescore) == 8.5) {
		echo '85';
	} elseif(($thescore) == 9) {
		echo '90';
	} elseif(($thescore) == 9.5) {
		echo '95';
	} elseif(($thescore) == 10) {
		echo '100';
	}
	
}

//////////////////////////////////////////////////////////////////
// EXCERPT
//////////////////////////////////////////////////////////////////
function hick_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'hick_excerpt_more');

function hick_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'hick_excerpt_length', 999 );

function hick_string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	
	return implode(' ', $words);
}

//////////////////////////////////////////////////////////////////
// AUTHOR SOCIAL LINKS
//////////////////////////////////////////////////////////////////
function hick_contactmethods( $contactmethods ) {

	$contactmethods['twitter']   = 'Twitter Username';
	$contactmethods['facebook']  = 'Facebook Username';
	$contactmethods['google']    = 'Google Plus Username';
	$contactmethods['tumblr']    = 'Tumblr Username';
	$contactmethods['instagram'] = 'Instagram Username';

	return $contactmethods;
}
add_filter('user_contactmethods','hick_contactmethods',10,1);

//////////////////////////////////////////////////////////////////
// Pagination
//////////////////////////////////////////////////////////////////
function hick_pagination() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagination"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&hellip;</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>&hellip;</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}


//////////////////////////////////////////////////////////////////
// Responsive
//////////////////////////////////////////////////////////////////
function aq_body_classes( $classes ) {

	if(hick_option('hick_responsive') == 1) $classes[] = 'responsive';

	return $classes;

}
add_filter('body_class','aq_body_classes');


// Here we populate the font face
$font_face_nav      = hick_option('hick_nav_font');
$font_face_main     = hick_option('hick_main_font');
$font_face_headings = hick_option('hick_headings_font');
$font_face_slider   = hick_option('hick_slider_font');

// Add the font to the helper class
VP_Site_GoogleWebFont::instance()->add($font_face_nav);
VP_Site_GoogleWebFont::instance()->add($font_face_main);
VP_Site_GoogleWebFont::instance()->add($font_face_headings);
VP_Site_GoogleWebFont::instance()->add($font_face_slider);

// embed font function
function hick_embed_fonts()
{
   VP_Site_GoogleWebFont::instance()->register_and_enqueue();
}
add_action('wp_enqueue_scripts', 'hick_embed_fonts');


//////////////////////////////////////////////////////////////////
// Helper Functions
//////////////////////////////////////////////////////////////////

function hick_kses($html)
{
	$allow = array_merge(wp_kses_allowed_html( 'post' ), array(
		'link' => array(
			'href'    => true,
			'rel'     => true,
			'type'    => true,
		),
		'script' => array(
			'src' => true,
			'charset' => true,
			'type'    => true,
		)
	));
	return wp_kses($html, $allow);
}

//////////////////////////////////////////////////////////////////
// LIMIT TAG AMOUNT IN CLOUD WIDGET
//////////////////////////////////////////////////////////////////
//Register tag cloud filter callback
add_filter('widget_tag_cloud_args', 'tag_widget_limit');

//Limit number of tags inside widget
function tag_widget_limit($args){

 //Check if taxonomy option inside widget is set to tags
 if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
  $args['number'] = 14; //Limit number of tags
 }

 return $args;
}


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.3.6
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'WooSidebars', // The plugin name
			'slug'     				=> 'woosidebars', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/woosidebars.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Theia Post Slider', // The plugin name
			'slug'     				=> 'theia-post-slider', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/theia-post-slider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tgmpa';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

//////////////////////////////////////////////////////////////////
// Review Data
//////////////////////////////////////////////////////////////////

add_action('save_post', 'hick_add_review_meta');

function hick_add_review_meta($post_id)
{
	$hick_meta_id = 'hickory_post';
	
	// check autosave
	if (defined('DOING_AUTOSAVE') AND DOING_AUTOSAVE AND !$this->autosave) return $post_id;
 
	// make sure data came from our meta box, verify nonce
	$nonce = isset($_POST[$hick_meta_id.'_nonce']) ? $_POST[$hick_meta_id.'_nonce'] : NULL ;
	if (!wp_verify_nonce($nonce, $hick_meta_id)) return $post_id;
 
	// check user permissions
	if ($_POST['post_type'] == 'page') 
	{
		if (!current_user_can('edit_page', $post_id)) return $post_id;
	}
	else 
	{
		if (!current_user_can('edit_post', $post_id)) return $post_id;
	}
 
	// authentication passed, process data
	$meta_data = isset( $_POST[$hick_meta_id] ) ? $_POST[$hick_meta_id] : NULL ;

	// if is review post
	if( $meta_data['hickory_post_type'] === 'review' )
	{
		if( isset( $meta_data['review'][0]['overall_score'] ) )
		{
			update_post_meta($post_id, 'hickory_review_score', $meta_data['review'][0]['overall_score']);
		}
	}

}

//////////////////////////////////////////////////////////////////
// Exclude posts
//////////////////////////////////////////////////////////////////

function hick_exclude_posts($widget_exclude)
{

	if(hick_option('hick_exclude_posts') == 1 || $widget_exclude == 'on') :
							
		// check which featured area layout is activated
		if(hick_option('hick_featured_layout') == 1) :
		
			//check if posts has been assigned in the theme options
			if(hick_option('hick_featured_layout1_data')) :
				
				$exclude_posts = hick_option('hick_featured_layout1_data');
				return $exclude_posts;
				
			else :
			
				$args = array(
					'showposts' => 3,
					'meta_query' => array(
						array(
							'key' => 'is_featured',
							'value' => '1',
						)
					)
				 );
				$postslist = get_posts( $args );
				
				foreach($postslist as $post) {
					$exclude_posts[] = $post->ID;
				}
				return $exclude_posts;
			
			endif;
		
		else :
		
			if(hick_option('hick_featured_layout') == 2) :
				
				if(hick_option('hick_featured_layout2_data')) :
				
					$exclude_posts = hick_option('hick_featured_layout2_data');
					return $exclude_posts;
				
				else :
					
					$args = array(
						'showposts' => 5,
						'meta_query' => array(
							array(
								'key' => 'is_featured',
								'value' => '1',
							)
						)
					 );
					$postslist = get_posts( $args );
					
					foreach($postslist as $post) {
						$exclude_posts[] = $post->ID;
					}
					return $exclude_posts;
				
				endif;
				
			endif;
		
		endif;

	endif;
	
}