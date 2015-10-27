<?php
/**
 * @package youngxvidz
 */
?>


<?php // Styling Tip!

// Want to wrap for example the post content in blog listings with a thin outline in Bootstrap style?
// Just add the class "panel" to the article tag here that starts below.
// Simply replace post_class() with post_class('panel') and check your site!
// Remember to do this for all content templates you want to have this,
// for example content-single.php for the post single view. ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	<header>
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
		<h6 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h6>
		<?php if(function_exists('the_views')) : ?>
			<span class="views"><?php the_views(); ?></span>
		<?php endif; ?>
		<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
		<?php if ( is_single() ) : ?>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php youngxvidz_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_archive() ) : // Only display Excerpts for Search and Archive Pages ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<?php if ( is_single() ) : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'youngxvidz' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'youngxvidz' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'youngxvidz' ) );
				if ( $categories_list && youngxvidz_categorized_blog() ) :
			?>
			<?php if ( is_single() ) : ?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'youngxvidz' ), $categories_list ); ?>
			</span>
			<?php endif; ?>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'youngxvidz' ) );
				if ( $tags_list ) :
			?>
			<?php if ( is_single() ) : ?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', 'youngxvidz' ), $tags_list ); ?>
				</span>
			<?php endif; ?>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) && is_single() ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'youngxvidz' ), __( '1 Comment', 'youngxvidz' ), __( '% Comments', 'youngxvidz' ) ); ?></span>
		<?php endif; ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
