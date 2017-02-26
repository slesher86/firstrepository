<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package tdMacro
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function tdmacro_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
		'render' => 'tdmacro_infinite_scroll_render',
		'wrapper' => false,
        'footer_widgets' => 'footer-1',
	) );
}
add_action( 'after_setup_theme', 'tdmacro_jetpack_setup' );

/**
 * Custom render fucntion for the Jetpack Infinite Scroll
 *
 * @since tdmacro 1.0
 */
function tdmacro_infinite_scroll_render() {
	echo '<div class="infinite-wrap">';
	while( have_posts() ) {
		the_post();
		echo '<div class="col-lg-4 col-md-4 three-columns post-box infinite-scroll-item">';
		get_template_part( 'template-parts/content', get_post_format() );
		echo '</div><!-- .col -->';
	}
	echo '</div><!-- .infinite-wrap -->';
}
