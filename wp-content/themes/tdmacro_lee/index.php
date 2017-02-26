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
 * @package tdMacro
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-lg-12">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<div id="blog-grid" class="row content-grid">
				<?php while ( have_posts() ) : the_post(); ?>
                    
					<div class="col-lg-4 col-md-4 three-columns post-box">
					   <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					</div><!-- .post-box -->
                    
				<?php endwhile; ?>
				</div><!-- .row -->

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
