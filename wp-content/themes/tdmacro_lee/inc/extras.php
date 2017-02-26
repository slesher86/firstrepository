<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package tdMacro
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function tdmacro_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'tdmacro_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tdmacro_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// adds a custom class if user wants to hide post content on a blog page.
	// when post has a featured image
	if ( tdmacro_show_featured_image_only() ) {
		$classes[] = 'featured-image-only';
	}

    // Adds class if the sidebar does not have any widgets.
    if ( !is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'inactive-sidebar';
    }

	return $classes;
}
add_filter( 'body_class', 'tdmacro_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 */
function tdmacro_post_classes( $classes ) {
	// adds a custom class when post has a featured image
	if( has_post_thumbnail() ) {
		$classes[] = 'has-featured-img';
	}
	return $classes;
}
add_filter('post_class', 'tdmacro_post_classes');

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function tdmacro_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'tdmacro' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'tdmacro_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function tdmacro_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'tdmacro_setup_author' );

/**
 * Checks if user wants to hide/show post content when post has a featured image
 *
 * @since tdmacro 1.0
 */
function tdmacro_show_featured_image_only() {
	if( 'hide' != get_theme_mod( 'tdmacro_is_featured_image_without_content', 'hide' ) ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Auto Post Summary
 *
 * @since tdmacro 1.0
 */
function tdmacro_is_auto_post_summary() {
	return get_theme_mod( 'tdmacro_is_auto_post_summary', '1' );
}
