<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package tdMacro
 */

get_header(); ?>

<div id="primary" class="content-area container">
    <main id="main" class="site-main" role="main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h4 class="meta-404"><?php esc_html_e( '404', 'tdmacro' ); ?></h4>
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'tdmacro' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'tdmacro' ); ?></p>

                <?php get_search_form(); ?>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>