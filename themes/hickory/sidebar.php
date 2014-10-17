			<div id="sidebar">
				
				<!-- SIDEBAR WIDGET AREA -->
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Area")) : ?>  
					<p><?php _e('No widgets added', 'hickory'); ?></p>
		        <?php endif; ?>
			
			</div>