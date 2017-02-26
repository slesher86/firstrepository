<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package tdMacro
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<section id="primary" class="content-area col-lg-12">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'tdmacro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<div id="blog-grid" class="row content-grid">
				<?php while ( have_posts() ) : the_post(); ?>
                    
					<div class="col-lg-4 col-md-4 three-columns post-box">
					   <?php get_template_part( 'template-parts/content', 'search' ); ?>
					</div><!-- .post-box -->
                    
				<?php endwhile; ?>
				</div><!-- .row -->

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
