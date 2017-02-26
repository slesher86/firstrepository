<?php
/**
 * The Template for displaying a single attachment.
 *
 * @package tdMacro
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-lg-12">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'attachment' ); ?>

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

		<div class="col-lg-4 col-md-4">
			<?php get_sidebar(); ?>
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
