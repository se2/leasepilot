<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer">
	<div class="footer-container">
		<div id="footer-widgets" class="grid-x grid-margin-x">
			<?php for ($i = 1; $i <= 6 ; $i++): ?>
			<div id="footer-widget-<?php echo $i; ?>" class="footer-menu small-12 medium-3 large-2 cell">
					<?php if ( is_active_sidebar( 'footer-widget-' . $i ) ) { dynamic_sidebar( 'footer-widget-' . $i ); } ?>
			</div>
			<?php endfor; ?>
		</div>
	</div>
	<div class="footer-container">
		<div class="grid-x">
			<div class="cell medium-4 large-3">
				<?php
				$footer_logo = get_field( 'footer_logo', 'option' ) ? get_field( 'footer_logo', 'option' ) : get_template_directory_uri() . '/dist/assets/images/leasepilot-logo-footer.png';
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo esc_attr( $footer_logo ); ?>" alt="<?php bloginfo(); ?>" class="site-logo">
				</a>
			</div>
			<div class="cell medium-5 large-8 copyright">
				<p><?php the_field( 'footer_address', 'option' ) ?><?php echo '<br/>' . get_field( 'footer_copyright', 'option' ); ?></p>
			</div>
			<div class="cell medium-3 large-1 socials">
				<?php
				if ( have_rows( 'socials', 'option' ) ) :
					while ( have_rows( 'socials', 'option' ) ) : the_row();
				?>
				<a href="<?php the_sub_field( 'social_link', 'option' ); ?>" class="social-link" target="_blank">
					<span class="icon-<?php echo strtolower( get_sub_field( 'social_service_id', 'option' ) ); ?>"></span>
				</a>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>

</body>

</html>
