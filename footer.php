<?php
/**
 * Footer template
 *
 * @package Portfolio Press
 */

	$theme_dir = get_stylesheet_directory_uri();
?>
	</div>
	</div><!-- #main -->
	<footer id="colophon">
		<div class="col-width">

	    <?php if ( is_active_sidebar('footer-1') ||
			is_active_sidebar('footer-2') ||
			is_active_sidebar('footer-3') ||
			is_active_sidebar('footer-4') ) : ?>

			<div id="footer-widgets">

				<?php $i = 0; while ( $i <= 4 ) : $i++; ?>
					<?php if ( is_active_sidebar('footer-'.$i) ) { ?>

				<div class="block footer-widget-<?php echo $i; ?>">
		        	<?php dynamic_sidebar('footer-'.$i); ?>
				</div>

			        <?php } ?>
				<?php endwhile; ?>

				<div class="clear"></div>

			</div><!-- /#footer-widgets  -->

	    <?php else: ?>
	    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-left-widget') ) ?>
	        <ul id="social-icons">
	          <li><a href="https://twitter.com/#!/TechOhioState" target="_blank" class='social-icon social-icon-twitter'><img src="<?php echo $theme_dir; ?>/images/icon-twitter.png"/></a></li>
	          <li><a href="https://plus.google.com/108267101328574178433/posts" target="_blank" class='social-icon social-icon-google-plus'><img src="<?php echo $theme_dir; ?>/images/icon-google-plus.png"/></a></li>
	          <li><a href="http://www.linkedin.com/groups/Tech-Ohio-State-Office-Chief-4956310" target="_blank" class='social-icon social-icon-linkedin'><img src="<?php echo $theme_dir; ?>/images/icon-linkedin.png"/></a></li>
	          <li><a href="http://www.youtube.com/techohiostate" target="_blank" class='social-icon social-icon-youtube'><img src="<?php echo $theme_dir; ?>/images/icon-youtube.png"/></a></li>
	          <li><a href="http://ocio.osu.edu/blog/community/feed/" target="_blank" class='social-icon social-icon-rss'><img src="<?php echo $theme_dir; ?>/images/icon-rss.png"/></a></li>
	        </ul>
			<div id="footer-content">
			  	<a href="http://ocio.osu.edu" title="Office of the CIO"><img id="footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/osu-footer-grey.png" alt="Office of the CIO"/></a>
	        	<p class="secondary-signature">Office of the Chief Information Officer</p>
	        	<p>Contact: <a href="http://ocio.osu.edu/help/" target="_blank">IT Service Desk</a> | <a href="http://ocio.osu.edu/help/locations/">Locations</a><span class="mobile-hidden"> | </span><span class="mobile-block">Phone: <a href="tel:614-688-4357">614-688-HELP (4357)</a></span><span class="mobile-block"><span class="mobile-hidden"> | </span>TDD: 614-688-8743</span></p>
	        	<p>If you have trouble accessing this page and need to request an alternate format, contact <a href="mailto:8help@osu.edu">8help@osu.edu</a>.</p>
	     	</div>
 	    <?php endif; ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>