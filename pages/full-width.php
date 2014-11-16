<?php
/**
Template Name: Full-Width
 *
 * Sidebar Blog Template .
 *
 * @package garua
 */


get_header(); ?>

	<div id="primary" class="content-area garua-full">
		<main id="main" class="site-main " role="main">
		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						//echo '<span class="sh-quarter-column ">bla</span>';
						//echo '<span class="sh-three-quarters-column ">';
						echo '<span class="sh-eight-column " >';
						comments_template();
						echo '</span>' ;
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>