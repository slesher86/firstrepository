<?php
/**
 * The Template for displaying all single posts.
 *
 * @package tdMacro
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-lg-12">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php tdmacro_post_nav(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
