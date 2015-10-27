<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package youngxvidz
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<header>
			<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'youngxvidz' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</header><!-- .page-header -->

		<?php // start the loop. ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php echo '<div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">'; ?>
			<?php get_template_part( 'content', 'video' ); ?>
			<?php echo '</div>'; ?>

		<?php endwhile; ?>

		<?php youngxvidz_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'search' ); ?>

	<?php endif; // end of loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>