<?php
/**
 * tdMacro functions and definitions
 *
 * @package tdMacro
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 620;
}

if ( ! function_exists( 'tdmacro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tdmacro_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tdMacro, use a find and replace
	 * to change 'tdmacro' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tdmacro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

	add_image_size( 'banner-small-image', 760, 500, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'tdmacro' ),
		'social' => esc_html__( 'Social Menu', 'tdmacro' ),
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tdmacro_custom_background_args', array(
		'default-color' => 'ecf0f1',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

    /*
	 * Enable support for custom logo.
	 */
    add_theme_support( 'custom-logo', array(
		'height'      => 140,
		'width'       => 320,
		'flex-height' => true,
        'header-text' => array( 'site-title', 'site-description' ),
	) );

    /*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	add_editor_style( array( 'css/editor-style.css', tdmacro_google_fonts() ) );
}
endif; // tdmacro_setup
add_action( 'after_setup_theme', 'tdmacro_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tdmacro_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tdmacro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'tdmacro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'tdmacro' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'tdmacro' ),
		'before_widget' => '<div class="col-lg-3 col-md-3 footer-widget"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div><!-- .footer-widget -->',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'tdmacro_widgets_init' );

/**
 * Register Google Fonts.
 */
function tdmacro_google_fonts() {
	$fonts_url = '';

    /* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$sans_font = _x( 'on', 'Source Sans Pro: on or off', 'tdmacro' );

	if ( 'off' !== $sans_font ) {
		$font_families = array();
		$font_families[] = 'Source Sans Pro:400,400i,700,700i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext,cyrillic,cyrillic-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function tdmacro_scripts() {

	wp_enqueue_style( 'tdmacro-fonts', tdmacro_google_fonts(), array(), null );
	wp_enqueue_style( 'tdmacro-css-framework', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'tdmacro-style', get_stylesheet_uri() );
	wp_enqueue_script( 'tdmacro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    if ( ! is_singular() ) {
		wp_enqueue_script( 'masonry' );
	}

	wp_register_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array(), '201609', true  );
wp_register_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.js', array('jquery'), '201609', true  );
	wp_enqueue_script( 'tdmacro-script', get_template_directory_uri() . '/js/tdmacro.js', array( 'tinynav' ), '201609', true  );
}
add_action( 'wp_enqueue_scripts', 'tdmacro_scripts' );

/**
 *	Customize excerpts more tag.
 */
function tdmacro_excerpt_more( $more ) {
	return '&#x2026; <a class="more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . esc_html__( 'Read More', 'tdmacro' ) . '</a>';
}
add_filter( 'excerpt_more', 'tdmacro_excerpt_more' );

/**
 * IE8 Support
 * @since tdmacro 1.0
 */
function tdmacro_head() {
?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri() ?>/js/html5.js"></script>
	<script src="<?php echo get_template_directory_uri() ?>/js/respond.js"></script>
	<![endif]-->
<?php
}
add_action( 'wp_head', 'tdmacro_head' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom colors file.
 */
require get_template_directory() . '/inc/custom-colors.php';

/**
 * Load Dashboard help file.
 */
require get_template_directory() . '/inc/help/helper.php';
