<?php
	/**
	 * Page Footer
	 *
	 * @category   Components
	 * @package    FoundationPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

if ( get_field( 'show_footer_cta' ) ) : ?>
<!-- CTA Section -->
<div class="cta-section cta-section--blue">
	<div class="main-container max-900">
		<div class="grid-x">
			<div class="cell large-12 small-12 medium-12">
				<h4 class="cta-section__title ff-hn"><?php the_field( 'footer_cta_content' ); ?></h4>
				<?php if ( get_field( 'hubspot_form_popup' ) ) : ?>
				<a class="button button__cta button__cta--dark mb0" href="#!" data-open="request-demo"><?php the_field( 'footer_cta_title' ); ?></a>
				<?php else : ?>
				<a class="button button__cta button__cta--dark mb0" href="<?php the_field( 'footer_cta_link' ); ?>"><?php the_field( 'footer_cta_title' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- /CTA Section -->
<?php endif; ?>

<!-- Page Footer -->
<div class="main-container">
	<div class="main-grid">
		<footer>
			<?php
				wp_link_pages(
					array(
						'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
						'after'  => '</p></nav>',
					)
				);
			?>
			<?php
			$tag = get_the_tags();
			if ( $tag ) {
			?>
			<p><?php the_tags(); ?></p>
			<?php } ?>
		</footer>
	</div>
</div>
<!-- /Page Footer -->
