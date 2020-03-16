<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ASCampers
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ascampers' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="site-branding col-lg-3 col-6">
					<a href="/"><img src="<?php the_field('site_logo', 'option'); ?>" alt="All Star Camper Logo"></a>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation col-lg-8 col-3">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary-menu',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->
				<div class="cart col-lg-1 col-3 align-self-center">
					<?php echo do_shortcode('[woo_cart_but]'); ?>
				</div>
			</div>
		</div>
		
		
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
