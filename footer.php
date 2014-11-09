<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package garua
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="header-container">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'garua' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'garua' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'garua' ), 'garua', '<a href="http://estudioMxd.com" rel="designer">Ariel Kuhn</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
