					<div id="comments">
					
					<div class="post-comments">
						
						<?php 
							if ( comments_open() ) :
							echo "<h3 class='comments-title'>";
							comments_number(__('No Comments','hickory'), __('1 Comment','hickory'), '% ' . __('Comments','hickory') );
							echo "</h3>";
							endif;

							echo "<div class='comments'>";
							
								wp_list_comments(array(
									'avatar_size'	=> 55,
									'max_depth'		=> 5,
									'style'			=> 'ul',
									'callback'		=> 'hickory_comments',
									'type'			=> 'all'
								));

						 	echo "</div>";

							echo "<div id='comments_pagination'>";
								paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;'));
							echo "</div>";

							$custom_comment_field = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';  //label removed for cleaner layout

							comment_form(array(
								'comment_field'			=> $custom_comment_field,
								'comment_notes_after'	=> '',
								'logged_in_as' 			=> '',
								'comment_notes_before' 	=> '',
								'title_reply'			=> __('Leave a reply', 'hickory'),
								'cancel_reply_link'		=> __('Cancel reply', 'hickory'),
								'label_submit'			=> __('Post comment', 'hickory')
							));
						 ?>


					</div> <!-- end comments div -->
					
					</div>
