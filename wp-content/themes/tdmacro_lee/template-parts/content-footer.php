<?php
/**
 * Template part for displaying post's footer section in archive views.
 *
 * @package tdMacro
 */

?>

<footer class="entry-footer clearfix">
    <div class="pull-left">
        <?php echo tdmacro_get_post_author(); ?>
    </div><!-- .pull-left -->

    <div class="pull-right">
        <span class="entry-comments">
            <?php comments_popup_link( esc_html__( '0', 'tdmacro' ), esc_html__( '1', 'tdmacro' ), esc_html__( '%', 'tdmacro' ) ); ?>
        </span><!-- .entry-comments -->
    </div><!-- .pull-right -->
</footer><!-- .entry-footer -->
