<?php 

$orig_post = $post;
global $post;

$categories = get_the_category($post->ID);

if ($categories) {

	$category_ids = array();

	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
	
	if(vp_metabox('hickory_post.post_size') == 'full_post') :
	$args = array(
		'category__in'     => $category_ids,
		'post__not_in'     => array($post->ID),
		'posts_per_page'   => 5, // Number of related posts that will be shown.
		'caller_get_posts' => 1
	);
	else :
	$args = array(
		'category__in'     => $category_ids,
		'post__not_in'     => array($post->ID),
		'posts_per_page'   => 3, // Number of related posts that will be shown.
		'caller_get_posts' => 1
	);
	endif;

	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) { ?>
		<div class="post-related"><h3><?php _e('You Might Also Like', 'hickory'); ?></h3><ul>
		<?php while( $my_query->have_posts() ) {
			$my_query->the_post();?>
			<li>
				<div class="related-item">
				
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<a href="<?php echo get_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('related'); ?></a>
					<?php } ?>
					
					<span class="cat">
					<?php 
					$category = get_the_category(get_the_ID()); 
					if($category[0]){
						echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
					}
					?>
					</span>
					<h4><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
				
				</div>
			</li>
		<?php
		}
		echo '</ul></div>';
	}
}
$post = $orig_post;
wp_reset_query();

?>