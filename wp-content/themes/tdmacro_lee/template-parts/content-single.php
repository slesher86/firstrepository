<?php
/**
 * The template used for displaying single post content.
 *
 * @package tdMacro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumb">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumb -->
		<?php endif; ?>

		<div class="entry-meta clearfix">
			<div class="pull-left">
				<span class="entry-cats"><?php the_category('<span class="comma"> / </span>'); ?></span><!-- .entry-cats -->
			</div><!-- .pull-left -->
            
			<div class="pull-right">
				<span class="entry-comments">
				    <?php comments_popup_link( esc_html__( '0', 'tdmacro' ), esc_html__( '1', 'tdmacro' ), esc_html__( '%', 'tdmacro' ) ); ?>
				</span><!-- .entry-comments -->
			</div><!-- .pull-right -->
		</div><!-- .entry-meta -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="single-posted-on">
		  <?php echo tdmacro_single_posted_on(); ?>
		  <?php edit_post_link( esc_html__( 'Edit', 'tdmacro' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .single-posted-on -->

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
            the_content(); 
        
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'tdmacro' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>'
			) );
		?>
	</div><!-- .entry-content -->

	<?php the_tags( '<div class="entry-tags">', ' ', '</div><!-- .entry-tags -->' ); ?>

	<?php get_template_part( 'template-parts/author', 'section' ); ?>

</article><!-- #post-## -->
