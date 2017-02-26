<?php
/**
 * The template used for displaying page content in page.php.
 *
 * @package tdMacro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
            
            the_content(); 
        
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'tdmacro') . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>'
			) );
        
		?>
	</div><!-- .entry-content -->
    
	<?php edit_post_link( esc_html__( 'Edit', 'tdmacro' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
    
</article><!-- #post-## -->
