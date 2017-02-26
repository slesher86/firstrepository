<?php
/**
 * Template for displaying author section in single views.
 *
 * @package tdMacro
 */

$current_author_id = get_the_author_meta( 'ID' );

if ( get_the_author_meta( 'description', $current_author_id ) ) : ?>
<div class="author-section">
    <div class="about clearfix">
        <div class="gravatar"><?php echo get_avatar( $current_author_id, 192 ); ?></div><!-- .gravatar -->
        
        <div class="info">
            <h4 class="author-section-header"><span><?php esc_html_e( 'About', 'tdmacro' ); ?></span><a class="author-name" href="<?php echo esc_url( get_author_posts_url( $current_author_id ) ); ?>"><?php echo get_the_author(); ?></a></h4>
            <div class="about-description"><?php the_author_meta( 'description', $current_author_id ); ?></div>
        </div><!-- .info -->
    </div> <!-- .about -->
</div><!-- .author-section -->
<?php endif; ?>
