<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<header class="site-header" role="banner">
		<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
			</div>
		</div>
		<div class="grid-container">
			<div class="grid-x flex-bottom">
				<div class="cell small-12 medium-3 large-3">
					<div class="top-bar-left">
						<div class="site-desktop-title top-bar-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/leasepilot-logo.svg" alt="<?php bloginfo( 'title' ); ?>" class="site-logo" title="<?php bloginfo( 'title' ); ?>">
							</a>
						</div>
					</div>
				</div>
				<div class="cell hide-for-small-only hide-for-mobile-only hide-for-medium-only large-9">
					<div class="top-menu">
						<?php wp_nav_menu(array(
							'menu' => 'Top Menu'
						)); ?>
					</div>
					<?php foundationpress_top_bar_r(); ?>
					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
