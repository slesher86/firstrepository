<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tdMacro
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="container clearfix">
			<div class="site-branding pull-left">
                <?php tdmacro_the_custom_logo(); ?>

				<?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif;

                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
			</div><!-- .site-branding -->
			<div class="header-controls pull-right">
				<?php get_template_part( 'menu', 'social' ); ?>
			</div><!-- .header-controls -->
		</div><!-- .container -->
	</header><!-- #masthead -->

	<div class="container clearfix">
		<nav id="site-navigation" class="main-navigation" role="navigation" data-small-nav-title="<?php esc_attr_e( 'Navigation', 'tdmacro' ); ?>">
		<?php if ( has_nav_menu( 'primary' ) ): ?>
			<?php wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'nav-bar clearfix', 'theme_location' => 'primary') ); ?>
		<?php else: ?>
			<ul class="list-unstyled nav-bar clearfix">
				<?php wp_list_pages( 'title_li=' ); ?>
			</ul><!-- .nav-bar -->
		<?php endif; ?>
		</nav><!-- #site-navigation -->
	</div><!-- .container -->

	<div id="content" class="site-content">
