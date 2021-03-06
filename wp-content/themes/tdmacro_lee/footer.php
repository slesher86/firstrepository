<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package tdMacro
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if( is_active_sidebar( 'footer-1' ) ): ?>
		<div  class="container">
			<div id="footer-widgets" class="row">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div><!-- .row -->
		</div><!-- .container -->
		<?php endif; ?>

		<div class="footer-bottom">
			<div class="container clearfix">
				<div class="pull-left site-info">
                
				</div><!-- .site-info -->
                
				<div class="pull-right social-links">
					<?php get_template_part( 'menu', 'social' ); ?>
				</div><!-- .social-links -->
			</div><!-- .container -->
		</div><!-- .footer-bottom -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<div id="gotop"><i class="fa fa-angle-up"></i></div><!-- #gotop -->

<?php wp_footer(); ?>

</body>
</html>
