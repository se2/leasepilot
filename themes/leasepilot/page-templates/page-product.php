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
	?>
	<div class="page-block page-block--animated page-block--animated--none pos-rel no-overflow" <?php echo ( $is_right ) ? ' style="background-color:#f6f5f5;"' : ''; ?>>
		<div class="main-container h100p pos-rel">
			<div class="grid-x grid-margin-x h100p">
				<?php if ( $is_right ) : ?>
				<div class="cell small-12 medium-6 large-5 pos-rel stack-up">
					<img src="<?php the_sub_field( 'image' ); ?>" alt="" class="product-image box-shadow product-image--left">
				</div>
				<?php endif; ?>
				<div class="cell small-12 medium-6 large-6 stack-down <?php echo ( $is_right ) ? 'large-offset-1 text-right' : ''; ?>">
					<h3 class="secondary-color"><?php the_sub_field( 'title' ); ?><br><span class="lighter ff-hn"><?php the_sub_field( 'subtitle' ); ?></span></h3>
					<?php the_sub_field( 'content' ); ?>
					<a href="<?php the_sub_field( 'cta_button_link' ); ?>" class="button button__cta button__cta--dark"><?php the_sub_field( 'cta_button_title' ); ?></a>
				</div>
				<?php if ( ! $is_right ) : ?>
				<div class="cell small-12 medium-6 large-5 large-offset-1 pos-rel stack-up">
					<img src="<?php the_sub_field( 'image' ); ?>" alt="" class="product-image box-shadow">
				</div>
				<?php endif; ?>
			</div>
		</div>
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
