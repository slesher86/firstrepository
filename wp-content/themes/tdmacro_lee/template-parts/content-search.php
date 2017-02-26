<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package tdMacro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<?php get_template_part( 'template-parts/content', 'header' ); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
    
    <?php get_template_part( 'template-parts/content', 'footer' ); ?>
	
</article><!-- #post-## -->
