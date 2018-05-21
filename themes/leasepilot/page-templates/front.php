<?php
	/**
	 * Template Name: Front
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

	<!-- 2-column section -->
	<div class="page-block page-block--2-cols" style="background-color:#ffffff;">
		<div class="main-container">
			<div class="grid-x">
				<div class="cell stack-down page-block--2-cols__left small-12 medium-7">
					<h3 class="ff-hn lighter fz-30 page-block--2-cols__title secondary-color">Document automation & data capture for commerical leasing.</h3>
					<p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet hendrerit libero. Nulla tincidunt, mauris vitae varius.</p>
					<br>
					<a href="/#!" class="button button__primary mb0">Learn more »</a>
				</div>
				<div class="cell stack-up page-block--2-cols--img page-block--2-cols__right small-12 medium-5 text-right">
					<img src="<?php echo esc_attr( get_site_url() ); ?>/wp-content/uploads/2018/05/screenshot_11.png" alt="LeasePilot" class="box-shadow">
				</div>
			</div>
		</div>
	</div>
	<!-- /2-column section -->

	<!-- Animated section -->
	<div class="page-block page-block--animated page-block--animated--right pos-rel" id="section-img-crop">
		<div class="h100p inner-div-bg img-crop">
			<img src="<?php echo esc_attr( get_site_url() ); ?>/wp-content/uploads/2018/05/tailored.png" alt="" class="bg-image">
		</div>
		<div class="main-container h100p pos-rel">
			<div class="grid-x h100p">
				<div class="cell small-12 medium-7 large-6">
					<h3 class="secondary-color">Tailored for your company’s <span class="lighter ff-hn">documents and process</span></h3>
					<p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consectetur quam quis magna convallis dictum. Sed sapien sapien, tempus.</p>
					<a href="/#!" class="button button__cta button__cta--dark">See the product »</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /Animated section -->

	<!-- Animated section -->
	<div class="page-block page-block--animated pos-rel" id="section-bar" style="background-color:#f9f4f2;">
		<div class="inner-div-bg bars bg-contain page-block--animated--left hide-for-mobile-only hide-for-small-only" style="background-image:url('<?php echo esc_attr( get_site_url() ); ?>/wp-content/uploads/2018/05/turbocharge.png');">
			<?php
			$bars = array( 341, 90, 134, 558, 206, 90 );
			foreach ( $bars as $key => $bar ) {
			?>
			<div class="bar__outer" style="height:<?php echo esc_attr( $bar ); ?>px;">
				<div class="bar__inner"></div>
			</div>
			<?php } ?>
		</div>
		<div class="main-container h100p pos-rel">
			<div class="grid-x h100p">
				<div class="cell small-12 medium-7 medium-offset-5 large-6 large-offset-6 text-right">
					<h3 class="secondary-color">Turbocharge lease<span class="lighter ff-hn"><br>drafting & negotiation</span></h3>
					<p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consectetur quam quis magna convallis dictum. Sed sapien sapien, tempus.</p>
					<a href="/#!" class="button button__cta button__cta--dark">See our partners »</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /Animated section -->

	<!-- Animated section -->
	<div class="page-block page-block--animated pos-rel" id="section-computer">
		<div class="h100p inner-div-bg inner-div-bg--fade page-block--animated--right bg-cover" style="background-image:url('<?php echo esc_attr( get_site_url() ); ?>/wp-content/uploads/2018/05/transform.png');">
		</div>
		<div class="main-container h100p">
			<div class="grid-x h100p pos-rel">
				<div class="cell small-12 medium-7 large-6">
					<h3 class="secondary-color">Transform your business <span class="lighter ff-hn">with leasing data</span></h3>
					<p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consectetur quam quis magna convallis dictum. Sed sapien sapien, tempus.</p>
					<a href="/#!" class="button button__cta button__cta--dark">Explore features »</a>
				</div>
			</div>
		</div>
		<img class="computer-img hide-for-small-only hide-for-mobile-only " src="<?php echo esc_attr( get_site_url() ); ?>/wp-content/uploads/2018/05/computer.png" alt="">
	</div>
	<!-- /Animated section -->

	<!-- Comparison section -->
	<div class="page-block page-block--compare pos-rel bg-cover" id="section-compare" style="background-image:url('<?php echo esc_attr( get_site_url() ); ?>/wp-content/uploads/2018/05/compare.png');">
		<div class="main-container h100p">
			<div class="grid-x pos-rel flex-center-items">
				<div class="cell small-12 medium-6 large-4">
					<h2 class="secondary-color">How do you <span class="lighter ff-hn">stack up?</span></h2>
					<p class="secondary-color">Want a more personalized comparison?</p>
					<a href="/#!" class="button button__cta button__cta--dark mb0">Find our now »</a>
				</div>
				<div class="cell large-6 large-offset-2 ba-slider" id="comparison">
					<div class="after no-overflow">
						<div class="grid-x grid-margin-x">
							<div class="cell small-6">
								<h1 class="ff-hn lighter">0</h1>
								<h5 class="ff-hn lighter">pages needed to review for accuracy of edits</h5>
							</div>
							<div class="cell small-6">
								<h1 class="ff-hn lighter">30</h1>
								<h5 class="ff-hn lighter">days to complete lease</h5>
							</div>
							<div class="cell small-6">
								<h1 class="ff-hn lighter">90%</h1>
								<h5 class="ff-hn lighter">stat/info goes here</h5>
							</div>
							<div class="cell small-6">
								<h1 class="ff-hn lighter">30</h1>
								<h5 class="ff-hn lighter">minutes to prepare first-draft of lease</h5>
							</div>
						</div>
					</div>
					<div class="before no-overflow">
						<div class="grid-x grid-margin-x">
							<div class="cell small-6">
								<h1 class="ff-hn lighter">60+</h1>
								<h5 class="ff-hn lighter">pages needed to review for accuracy of edits</h5>
							</div>
							<div class="cell small-6">
								<h1 class="ff-hn lighter">100</h1>
								<h5 class="ff-hn lighter">days to complete lease</h5>
							</div>
							<div class="cell small-6">
								<h1 class="ff-hn lighter">28%</h1>
								<h5 class="ff-hn lighter">stat/info goes here</h5>
							</div>
							<div class="cell small-6">
								<h1 class="ff-hn lighter">120</h1>
								<h5 class="ff-hn lighter">minutes to prepare first-draft of lease</h5>
							</div>
						</div>
					</div>
					<span class="handle"></span>
				</div>
			</div>
		</div>
	</div>
	<!-- /Comparison section -->

	<!-- 2-column section -->
	<div class="page-block page-block--2-cols" style="background-color:#ffffff;">
		<div class="main-container">
			<div class="grid-x flex-center-items">
				<div class="cell page-block--2-cols__left small-12 medium-7">
					<h3 class="ff-hn lighter page-block--2-cols__title secondary-color">Call-to-action about your company’s latest intelligence</h3>
					<p class="secondary-color mb0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet hendrerit libero. Nulla tincidunt, mauris vitae varius.</p>
				</div>
				<div class="cell page-block--2-cols__right small-12 medium-5 text-center">
					<a href="/#!" class="button button__primary mb0">See what's possible »</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /2-column section -->

	<?php get_template_part( 'template-parts/page', 'blocks' ); ?>

</div>

<?php endwhile; ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer(); ?>
