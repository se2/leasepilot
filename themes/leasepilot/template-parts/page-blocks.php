<?php
	/**
	 * Page Blocks
	 *
	 * @category   Components
	 * @package    FoundationPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

if ( have_rows( 'case_study_blocks' ) ) {
	$blocks = get_field( 'case_study_blocks' );
	foreach ( $blocks as $key => $block ) {
		switch ( $block['acf_fc_layout'] ) {
			case 'big_heading_block':
?>
<!-- Big text block -->
<div class="page-block page-block--big-text" style="background-color:<?php echo esc_attr( $block['block_background_color'] ); ?>;">
	<div class="main-container">
		<div class="grid-x">
			<div class="cell small-12 medium-9">
				<h1 class="ff-hn lighter" style="<?php echo 'color:' . esc_attr( $block['text_color'] ); ?>"><?php echo esc_attr( $block['big_heading'] ); ?></h1>
			</div>
		</div>
	</div>
</div>
<!-- /Big text block -->
<?php
				break;
			case 'text_quote_block':
?>
<!-- Text Quote block -->
<div class="page-block page-block--text-quote" style="background-color:<?php echo esc_attr( $block['block_background_color'] ); ?>;">
	<div class="main-container">
		<div class="grid-x grid-margin-x">
			<div class="cell medium-4">
				<h3 class="ff-cd primary-color"><?php echo esc_attr( $block['block_title'] ); ?></h3>
				<h4 class="quote secondary-color"><?php echo esc_attr( $block['block_quote'] ); ?></h4>
			</div>
			<div class="cell medium-8"><?php echo esc_attr( $block['block_content'] ); ?></div>
		</div>
	</div>
</div>
<!-- /Text Quote block -->
<?php
				break;
			case 'cta_block':
?>
<!-- Block CTA -->
<div class="page-block page-block--cta-img <?php echo ( 'bottom' === $block['image_vertical_align'] ) ? 'page-block--cta-img--img-bottom' : ''; ?>" style="background-color:<?php echo esc_attr( $block['block_background_color'] ); ?>;">
	<div class="main-container">
		<div class="grid-x grid-margin-x flex-center-items">
			<div class="cell medium-7 <?php echo ( 'bottom' === $block['image_vertical_align'] ) ? 'large-8' : 'large-7'; ?> page-block--cta-img__img-wrapper">
				<img src="<?php echo esc_attr( $block['cta_image'] ); ?>" alt="<?php the_title(); ?>">
			</div>
			<div class="cell medium-5 <?php echo ( 'bottom' === $block['image_vertical_align'] ) ? 'large-4' : 'large-5'; ?> page-block--cta-img__content-wrapper">
				<h2 style="<?php echo 'color:' . esc_attr( $block['text_color'] ); ?>">
					<?php echo esc_attr( $block['cta_title'] ); ?>
					<span class="lighter ff-hn"><?php echo esc_attr( $block['cta_subtitle'] ); ?></span>
				</h2>
				<p style="<?php echo 'color:' . esc_attr( $block['text_color'] ); ?>"><?php echo esc_attr( $block['cta_description'] ); ?></p>
				<a href="<?php echo esc_attr( $block['cta_link'] ); ?>" class="button button__primary mb0"><?php echo esc_attr( $block['cta_button_title'] ); ?></a>
			</div>
		</div>
	</div>
</div>
<!-- /Block CTA -->
<?php
				break;
			case 'text_block':
?>
<!-- Text background section -->
<div class="page-block cta-section cta-section--secondary" style="<?php echo 'background-color:' . esc_attr( $block['block_background_color'] ); ?>">
	<div class="main-container">
		<div class="grid-x">
			<div class="cell large-12 small-12 medium-12">
				<h3 class="lighter ff-hn cta-section__title" style="<?php echo 'color:' . esc_attr( $block['text_color'] ); ?>"><?php echo esc_attr( $block['block_title'] ); ?></h3>
				<p class="mb0 cta-section__content" style="<?php echo 'color:' . esc_attr( $block['text_color'] ); ?>"><?php echo esc_attr( $block['block_content'] ); ?></p>
			</div>
		</div>
	</div>
</div>
<!-- /Text background section -->
<?php
				break;
			default:
				break;
		}
	}
}
?>
