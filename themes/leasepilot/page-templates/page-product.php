<?php
	/**
	 * Template Name: Product
	 *
	 * @category   Template
	 * @package    FoundationPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

<?php
while ( have_posts() ) :
	the_post();
?>

<div class="page-wrapper">

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

	<?php get_template_part( 'template-parts/page', 'blocks' ); ?>

	<?php
	if ( have_rows( 'product_content' ) ) :
		$index = 0;
		while ( have_rows( 'product_content' ) ) :
			$is_right = ( 0 === ( $index % 2 ) );
			the_row();
			$mobile_img  = get_sub_field( 'mobile_image' ) ? get_sub_field( 'mobile_image' ) : get_sub_field( 'image' );
			$cta_style   = 'button__cta--dark';
			if ( get_sub_field( 'cta_button_style' ) ) {
				$cta_style = get_sub_field( 'cta_button_style' );
			}
	?>

	<div class="page-block page-block--animated pos-rel animated--disable <?php echo ( $is_right ) ? 'page-block--animated--right' : ''; ?>" <?php echo ( $is_right ) ? ' style="background-color:#f6f5f5;"' : ''; ?>>
		<div class="h100p inner-div-bg bg-contain" style="background-image:url('<?php the_sub_field( 'image' ); ?>');"></div>
		<div class="main-container h100p pos-rel">
			<div class="grid-x h100p">
				<div class="cell small-12 medium-9 large-7 xlarge-6">
					<h3 class="secondary-color"><?php the_sub_field( 'title' ); ?> <span class="lighter ff-hn"><?php the_sub_field( 'subtitle' ); ?></span></h3>
					<p class="secondary-color"><?php the_sub_field( 'content' ); ?></p>
					<?php if ( get_sub_field( 'cta_button_title' ) && get_sub_field( 'cta_button_link' ) ) : ?>
					<a href="<?php the_sub_field( 'cta_button_link' ); ?>" class="button button__cta <?php echo esc_attr( $cta_style ); ?>"><?php the_sub_field( 'cta_button_title' ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if ( $mobile_img ) : ?>
		<img class="hide-for-medium hide-for-medium-up animated-mobile-img" src="<?php echo esc_attr( $mobile_img ); ?>" alt="<?php echo strip_tags( get_sub_field( 'title' ) ); ?>">
		<?php endif; ?>
	</div>

	<?php
			$index++;
		endwhile;
	endif;
	?>
	<?php wp_reset_postdata(); ?>

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</div>

<?php endwhile; ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer(); ?>
