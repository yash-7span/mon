<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MRS_Oil
 */

?>
<footer class="footer-wrapper bg-black overflow-hidden">
	<div class="footer-main container-fluid">
		<?php if ( is_active_sidebar( 'footer_widget' ) ) : ?>
			<div class="footer-subscription">
				<?php dynamic_sidebar( 'footer_widget' ); ?>
			</div>
		<?php endif; ?>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
