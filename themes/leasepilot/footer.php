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
        <div class="footer-grid">
            <?php dynamic_sidebar( 'footer-widgets' ); ?>
        </div>
    </div>
    <div class="footer-container">
        <div class="grid-x">
            <div class="cell medium-3">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/leasepilot-logo-footer.png" alt="">
                </a>
            </div>
            <div class="cell medium-offset-1 medium-5 copyright">
                <p>© Gadfly © 2018. All rights reserved.</p>
            </div>
            <div class="cell medium-3 socials">
                <a href="#" class="social-link">
                    <span class="icon-twitter"></span>
                </a>
                <a href="#" class="social-link">
                    <span class="icon-linkedin"></span>
                </a>
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