<?php
/**
Template Name: Blog-sidebar
 *
 * Sidebar Blog Template .
 *
 * @package garua
 */

__( 'cabecera', 'garua' );

get_header(); ?>

	<div id="primary" class="content-area garua-sidebar equalheight">
		<main id="main" class="site-main" role="main">
		<?php $args = array(  'posts_per_page' => 10 );?>
		<?php query_posts($args); ?>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php garua_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>