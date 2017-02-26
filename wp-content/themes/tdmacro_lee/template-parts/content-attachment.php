<?php
/**
 * The default template for displaying attachment content.
 *
 * @package tdMacro
 */

$metadata = wp_get_attachment_metadata();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="single-posted-on">
            <span class="parent-post-link"><a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a></span>
            <span class="entry-date"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></span>
            <span class="full-size-link"><a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo esc_html( $metadata['width'] ); ?> &times; <?php echo esc_html( $metadata['height'] ); ?></a></span>
            <?php edit_post_link( esc_html__( 'Edit', 'tdmacro' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .single-posted-on -->

	</header><!-- .entry-header -->

    <div class="entry-content">
        <div class="entry-attachment">
            <?php echo wp_get_attachment_image( get_the_ID(), 'full' );  ?>
        </div><!-- .entry-attachment -->
    </div><!-- .entry-content -->
</article><!-- #post-## -->
