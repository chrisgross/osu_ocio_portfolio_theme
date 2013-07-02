<?php

 	if ( of_get_option('layout') != 'layout-1col' ) : ?>
	<div id="sidebar" role="complementary">
		<ul class="xoxo">
		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>


		<?php endif; // end sidebar widget area ?>
		</ul>
	</div><!-- #secondary .widget-area -->
	<?php endif; ?>