<?php
/**
 * Template part for displaying posts.
 *
 * @package tdMacro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php get_template_part( 'template-parts/content', 'header' ); ?>

	<div class="entry-content">
    <?php

        if ( tdmacro_is_auto_post_summary() ) :
            the_excerpt();
        else:
            the_content( esc_html__( 'Read More', 'tdmacro' ) );
        endif;

        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'tdmacro' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>'
        ) );
    ?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'template-parts/content', 'footer' ); ?>

</article><!-- #post-## -->
