<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package youngxvidz
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<div class="row">
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				echo '<div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">';
					get_template_part( 'content', get_post_format() );
				echo '</div>'					
			?>

		<?php endwhile; ?>
		</div>
		<div class="pagination">
			<?php echo paginate_links(
				array(
					'base'               => '%_%',
					'format'             => '?page=%#%',
					'total'              => 1,
					'current'            => 0,
					'show_all'           => False,
					'end_size'           => 1,
					'mid_size'           => 10,
					'prev_next'          => True,
					'prev_text'          => __('« Previous'),
					'next_text'          => __('Next »'),
					'type'               => 'plain',
					'add_args'           => False,
					'add_fragment'       => '',
					'before_page_number' => '',
					'after_page_number'  => ''
					) ) ?>
				</div>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'index' ); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>