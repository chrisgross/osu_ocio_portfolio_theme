<?php

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


					<div class="entry-meta">

						 <?php
						 		if ( has_post_thumbnail() && of_get_option('portfolio_images', "1") ) {
                	if ( of_get_option( 'layout') == 'layout-1col' ) {
	                	the_post_thumbnail( 'portfolio-fullwidth' );
                	} else {
	                	the_post_thumbnail( 'portfolio-large' );
                	}
								}
								?>
								<div class="entry-meta-text">
									<nav id="nav-below">
					<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'portfolioplus' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', 'Prev <span class="meta-nav">' . _x( '&rarr;', 'Previous post link', 'portfolioplus' ) . '</span>' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Next post link', 'portfolioplus' ) . '</span> Next' ); ?></div>
				</nav><!-- #nav-below -->
						<div class="postby-meta"><?php portfoliopress_postby_meta(); ?></div>


			<?php
						$cat_list = get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' );
						$tag_list = get_the_term_list( $post->ID, 'portfolio_tag', '', ', ', '' );
						$utility_text = '';
						if ( ( $cat_list ) && ( '' ==  $tag_list ) )
							$utility_text = __( 'This entry was posted in %1$s.', 'portfoliopress' );
						if ( ( '' != $tag_list ) && ( '' ==  $cat_list ) )
							$utility_text = __( 'This entry was tagged %2$s.', 'portfoliopress' );
						if ( ( '' != $cat_list ) && ( '' !=  $tag_list ) )
							$utility_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'portfoliopress' );
						printf(
							$utility_text,
							$cat_list,
							$tag_list
						);
					?>

					<?php edit_post_link( __( 'Edit', 'portfoliopress' ), '<div class="edit-link">', '</div>' ); ?>
</div>

					</div><!-- .entry-meta -->

				<div class="entry-content">
					<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->




					<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'portfoliopress' ), 'after' => '</div>' ) ); ?>

			<?php if ( comments_open() ) {
				comments_template( '', true );
            } ?>

				</div><!-- .entry-content -->



			</article><!-- #post-<?php the_ID(); ?> -->


		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>