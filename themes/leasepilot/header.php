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
		<div class="main-content-full-width h100p">
			<div class="grid-x grid-padding-x flex-bottom">
				<div class="cell small-12 medium-3 large-3">
					<div class="top-bar-left">
						<div class="site-desktop-title top-bar-title">
							<?php
							$header_logo = get_field( 'header_logo', 'option' ) ? get_field( 'header_logo', 'option' ) : get_template_directory_uri() . '/dist/assets/images/leasepilot-logo.svg';
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo esc_attr( $header_logo ); ?>" alt="<?php bloginfo( 'title' ); ?>" class="site-logo" title="<?php bloginfo( 'title' ); ?>">
							</a>
						</div>
					</div>
				</div>
				<div class="cell hide-for-small-only hide-for-mobile-only hide-for-medium-only large-9">
					<?php foundationpress_top_bar_r(); ?>
					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>

	<?php if ( get_field( 'hubspot_form_portal_id', 'option' ) && get_field( 'hubspot_form_id', 'option' ) ) : ?>
	<!-- Known issue if using data-animation-out -->
	<!-- https://github.com/zurb/foundation-sites/issues/10626 -->
	<div class="reveal" id="request-demo" data-reveal style="background-color:#f6f5f5;" data-animation-in="ease-in">
		<!-- Form Section -->
		<div class="hubspot-form-reset form-section">
			<div class="grid-x grid-margin-x form-wrapper">
				<h3 class="form-title ff-hn secondary-color lighter">Request a Demo</h3>
				<div class="cell small-12">
					<?php // phpcs:disable ?>
					<!--[if lte IE 8]>
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
					<![endif]-->
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
					<script>
						hbspt.forms.create({
							portalId: "<?php the_field( 'hubspot_form_portal_id', 'option' ); ?>",
							formId: "<?php the_field( 'hubspot_form_id', 'option' ); ?>",
							css: ""
					});
					</script>
					<?php // phpcs:enable ?>
				</div>
			</div>
		</div>
		<!-- /Form Section -->
		<button class="close-button" data-close aria-label="Close modal" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php endif; ?>
