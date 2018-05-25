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

	<!-- Product Features Section -->
	<div class="product-features pos-rel">
		<div class="main-container h100p">
			<div class="grid-x h100p flex-center-items">
				<div class="cell product-features__cell small-12 medium-4 large-4">
					<img src="<?php the_clean_url(); ?>/wp-content/uploads/2018/05/resource-teer-sheet.png" alt="Freeform Editing">
					<h3 class="secondary-color">Freeform<br><span class="lighter ff-hn">Editing</span></h3>
					<p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas efficitur justo sed nulla commodo.</p>
				</div>
				<div class="cell product-features__cell small-12 medium-4 large-4">
					<img src="<?php the_clean_url(); ?>/wp-content/uploads/2018/05/standardization.png" alt="Standardization of Terms">
					<h3 class="secondary-color">Standardization<br><span class="lighter ff-hn">of Terms</span></h3>
					<p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas efficitur justo sed nulla commodo.</p>
				</div>
				<div class="cell product-features__cell small-12 medium-4 large-4">
					<img src="<?php the_clean_url(); ?>/wp-content/uploads/2018/05/resource-case-study.png" alt="Reporting and Analytics">
					<h3 class="secondary-color">Reporting &<br><span class="lighter ff-hn">Analytics</span></h3>
					<p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas efficitur justo sed nulla commodo.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- /Product Features Section -->

	<?php
	$parent = new WP_Query(array(
		'post_type'   => 'page',
		'post_parent' => $post->ID,
		'order'       => 'ASC',
		'orderby'     => 'menu_order',
	));
	if ( $parent->have_posts() ) :
		$index    = 0;
		while ( $parent->have_posts() ) :
			$is_right = ( 0 === ( $index % 2 ) );
			$parent->the_post();
			$product_image_class = ( $is_right ) ? 'product-image--left' : '';
	?>
	<div class="page-block page-block--animated page-block--animated--none pos-rel no-overflow" <?php echo ( $is_right ) ? ' style="background-color:#f6f5f5;"' : ''; ?>>
		<div class="main-container h100p pos-rel">
			<div class="grid-x grid-margin-x h100p">
				<?php if ( $is_right ) : ?>
				<div class="cell small-12 medium-6 large-6 pos-rel stack-up">
					<?php the_post_thumbnail( 'full', array( 'class' => 'product-image box-shadow ' . $product_image_class ) ); ?>
				</div>
				<?php endif; ?>
				<div class="cell small-12 medium-6 large-6 stack-down <?php echo ( $is_right ) ? 'text-right' : ''; ?>">
					<h3 class="secondary-color"><?php the_field( 'page_title' ); ?><br><span class="lighter ff-hn"><?php the_field( 'page_subtitle' ); ?></span></h3>
					<p class="secondary-color"><?php the_field( 'page_subheading' ); ?></p>
					<a href="<?php the_permalink(); ?>" class="button button__cta button__cta--dark">Learn more »</a>
				</div>
				<?php if ( ! $is_right ) : ?>
				<div class="cell small-12 medium-6 large-6 pos-rel stack-up">
					<?php the_post_thumbnail( 'full', array( 'class' => 'product-image box-shadow ' . $product_image_class ) ); ?>
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
