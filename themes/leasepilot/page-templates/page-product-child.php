<?php
	/**
	 * Template Name: Product Child
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

	<!-- Big text block -->
	<div class="page-block page-block--big-text" style="background-color:#fff;">
		<div class="main-container">
			<div class="grid-x">
				<div class="cell small-12">
					<h3>No Compromises</h3>
					<h4 class="ff-hn lighter">Automating your leasing workflow doesn’t have to mean giving up control</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris condimentum dapibus posuere. Vestibulum mollis nibh purus, quis dapibus lorem sagittis a. Donec congue eros quis tellus blandit tincidunt.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- /Big text block -->

	<!-- Step Block -->
	<div class="page-block page-block--animated pos-rel no-overflow product-child" style="background-color:#f6f5f5;">
		<div class="main-container h100p pos-rel">
			<div class="grid-x grid-margin-x h100p">
				<div class="cell small-12 medium-6 large-6 pos-rel stack-up">
					<img src="<?php the_clean_url(); ?>/wp-content/uploads/2018/05/data-to-doc.png" class="product-image product-image--boxed box-shadow" alt="Getting Started">
				</div>
				<div class="cell small-12 medium-6 large-6 stack-down text-right">
					<h3>Getting Started<br><span class="lighter ff-hn">It’s easier than you think</span></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris condimentum dapibus posuere. Vestibulum mollis nibh purus, quis dapibus lorem sagittis a. Donec congue eros quis tellus blandit tincidunt. Donec scelerisque.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Step Block -->

	<!-- Step Block -->
	<div class="page-block page-block--animated pos-rel no-overflow product-child" style="background-color:#fff;">
		<div class="main-container h100p pos-rel">
			<div class="grid-x grid-margin-x h100p">
				<div class="cell small-12 medium-6 large-6 stack-down">
					<h3>Step 1:<br><span class="lighter ff-hn">Send us your forms</span></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris condimentum dapibus posuere. Vestibulum mollis nibh purus, quis dapibus lorem sagittis a. Donec congue eros quis tellus blandit tincidunt. Donec scelerisque.</p>
				</div>
				<div class="cell small-12 medium-6 large-6 pos-rel stack-up">
					<img src="<?php the_clean_url(); ?>/wp-content/uploads/2018/05/streamline.png" class="product-image product-image--boxed box-shadow float-right" alt="Getting Started">
				</div>
			</div>
		</div>
	</div>
	<!-- Step Block -->

	<!-- Block CTA -->
	<div class="page-block page-block--cta-img page-block--cta-img--img-bottom page-block--cta-img--with-title" style="background-color:#3d4442;">
		<div class="main-container">
			<div class="grid-x grid-margin-x">
				<div class="cell title">
					<h1 class="fz-30 white-color ff-hn text-center lighter">eBook CTA Headline</h1>
					<p class="white-color text-center" style="font-size:24px;">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris condimentum dapibus posuere. Vestibulum mollis nibh purus
					</p>
				</div>
				<div class="cell medium-6 large-6 page-block--cta-img__img-wrapper">
					<img src="<?php the_clean_url(); ?>/wp-content/uploads/2018/05/cta-img.png" alt="<?php the_title(); ?>">
				</div>
				<div class="cell medium-5 large-5 page-block--cta-img__content-wrapper form-section form-section--1-column">
					<?php // phpcs:disable ?>
					<!--[if lte IE 8]>
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
					<![endif]-->
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
					<script>
						hbspt.forms.create({
							portalId: "2789668",
							formId: "9ba8d9c8-b30d-4a99-9620-38416b5c77ee",
							css: ""
						});
					</script>
					<?php // phpcs:enable ?>
					<!-- <a href="/#!" class="button button__primary mb0">Download eBook »</a> -->
				</div>
			</div>
		</div>
	</div>
	<!-- /Block CTA -->

	<!-- Step Block -->
	<div class="page-block page-block--animated pos-rel no-overflow product-child" style="background-color:#f6f5f5;">
		<div class="main-container h100p pos-rel">
			<div class="grid-x grid-margin-x h100p">
				<div class="cell small-12 medium-6 large-6 pos-rel stack-up">
					<img src="<?php the_clean_url(); ?>/wp-content/uploads/2018/05/data-to-doc.png" class="product-image product-image--boxed box-shadow" alt="Getting Started">
				</div>
				<div class="cell small-12 medium-6 large-6 stack-down text-right">
					<h3>Step 2:<br><span class="lighter ff-hn">QA Testing + Weekly Meetings</span></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris condimentum dapibus posuere. Vestibulum mollis nibh purus, quis dapibus lorem sagittis a. Donec congue eros quis tellus blandit tincidunt. Donec scelerisque.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Step Block -->

	<!-- Step Block -->
	<div class="page-block page-block--animated page-block--animated--none pos-rel no-overflow" style="background-color:#fff;">
		<div class="main-container h100p pos-rel">
			<div class="grid-x grid-margin-x h100p">
				<div class="cell small-12 medium-6 large-5 stack-down">
					<h3>Go Live</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris condimentum dapibus posuere. Vestibulum mollis nibh purus, quis dapibus lorem sagittis a. Donec congue eros quis tellus blandit tincidunt. Donec scelerisque.</p>
					<a href="<?php the_permalink(); ?>" class="button button__cta button__cta--dark">Learn more »</a>
				</div>
				<div class="cell small-12 medium-6 large-5 large-offset-1 stack-up pos-rel h100p">
					<img src="<?php the_clean_url(); ?>/wp-content/uploads/2018/05/go-live.png" class="product-image product-image--max-height" alt="Getting Started">
				</div>
			</div>
		</div>
	</div>
	<!-- Step Block -->

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</div>

<?php endwhile; ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer(); ?>
