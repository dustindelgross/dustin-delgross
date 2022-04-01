<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dustin_Delgross
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="cursor hex"></div>
		<div class="site-info">
			Made with a great deal of pride by Dustin Delgross.
				<?php
				/* translators: 1: Theme name, 2: Theme author. 
				printf( esc_html__( 'Made with a great deal of pride by %2$s.', 'dustin-delgross' ), 'dustin-delgross', '<a href="http://dustindelgross.com/">Dustin Delgross</a>' );*/
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
