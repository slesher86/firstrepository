<?php
/**
 * Template part for displaying post's header section in archive views.
 *
 * @package tdMacro
 */

?>

<?php if ( has_post_thumbnail() ): ?>
    
<div class="post-thumb">
    <a href="<?php echo esc_url( get_permalink() ); ?>" class="thumb-link">
        <?php the_post_thumbnail( 'banner-small-image' ); ?>
    </a><!-- .thumb-link -->

    <header class="entry-header">
        <?php if ( 'post' == get_post_type() ) : ?>
        <div class="entry-meta top">
            <span class="entry-cats"><?php the_category( '<span class="comma"> / </span>' ); ?></span><!-- .entry-cats -->
        </div><!-- .entry-meta -->
        <?php endif; ?>

        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header><!-- .entry-header -->
</div><!-- .post-thumb -->

<?php else: ?>

<header class="entry-header">
    <?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta top">
        <span class="entry-cats"><?php the_category( '<span class="comma"> / </span>' ); ?></span><!-- .entry-cats -->
    </div><!-- .entry-meta -->
    <?php endif; ?>

    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
</header><!-- .entry-header -->

<?php endif; ?>
