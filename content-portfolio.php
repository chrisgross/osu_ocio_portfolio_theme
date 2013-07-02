<?php
/**
 * This template displays portfolio post content
 *
 * @package Portfolio Press
 */

if ( is_page() && post_password_required() ) {
	echo get_the_password_form();
} else {
	// Set the size of the thumbnails and content width
	$fullwidth = false;
	if ( of_get_option( 'portfolio_sidebar' ) || is_page_template('full-width-portfolio.php') )
		$fullwidth = true;

	$thumbnail = 'portfolio-thumbnail';

	if ( $fullwidth )
		$thumbnail = 'portfolio-thumbnail-fullwidth';

	// This displays the portfolio full width, but doesn't change thumbnail sizes
	if ( of_get_option('layout','layout-2cr') ==  'layout-1col' )
		$fullwidth = true;

	// Query posts if this is being used as a page template
	if ( is_page_template() ) {

		global $paged;

		if ( get_query_var( 'paged' ) )
			$paged = get_query_var( 'paged' );
		elseif ( get_query_var( 'page' ) )
			$paged = get_query_var( 'page' );
		else
			$paged = 1;

		$posts_per_page = apply_filters( 'portfoliopress_posts_per_page', '15' );
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $posts_per_page,
			'paged' => $paged );
		query_posts( $args );
	}

?>

<div id="portfolio"<?php if ( $fullwidth ) { echo ' class="full-width"'; }?>>

	<?php if ( is_tax() ): ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php echo single_cat_title( '', false ); ?></h1>
		<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
	</header>

	<?php endif; ?>

	<?php  if ( have_posts() ) : $count = 0;
		while ( have_posts() ) : the_post(); $count++;

		$classes = 'portfolio-item item-' . $count;
		if ( $count % 3 == 0 ) {
			$classes .= ' ie-col3';
		}
		if ( !has_post_thumbnail() || post_password_required() ) {
			$classes .= ' no-thumb';
		}
		$terms = get_the_terms( $post->ID, 'portfolio_category' );
		foreach ($terms as $term) {
  		$classes .= ' post-category-' . $term->slug;
		}
		?>
		<div class="<?php echo $classes; ?>">
			<?php if ( has_post_thumbnail() && !post_password_required() ) { ?>
			<span class="thumb"><?php the_post_thumbnail(); ?></span>
			<?php $color = array_pop(get_post_custom_values('project_background', $post->ID)); ?>
			<?php } ?>
			<div class="overlay"><a href="<?php the_permalink() ?>" rel="bookmark" class="title-overlay" style="background-color:<?php echo $color; ?>">
				<span class="portfolio-item-title"><?php the_title(); ?></span>
				<span class="portfolio-item-excerpt"><?php the_excerpt(); ?></span>
			</a></div>
		</div>

		<?php endwhile; ?>

        <?php portfoliopress_content_nav(); ?>

		<?php else: ?>

			<h2 class="title"><?php _e( 'Sorry, no posts matched your criteria.', 'portfoliopress' ) ?></h2>

	<?php endif; ?>

</div><!-- #portfolio -->
<?php } ?>