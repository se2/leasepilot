<?php
	/**
	 * Template Name: About Page
	 *
	 * @category   Template
	 * @package    FoundationPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	while ( have_posts() ) :
		the_post();
	?>

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

	<!-- Page Content -->
	<div class="about-content content-padding">
		<div class="main-container">
			<main class="main-content">
				<div class="entry-content">
					<?php the_content(); ?>
					<?php if ( have_rows( 'people' ) ) : ?>
						<div class="grid-x grid-margin-x people-section">
							<?php
							while ( have_rows( 'people' ) ) :
								the_row();
							?>
							<div class="cell small-12 medium-4 large-4 people-section__person">
								<div class="people-section__avatar" style="background-image:url('<?php the_sub_field( 'avatar' ); ?>');"></div>
								<h3 class="people-section__name">
									<span class="ff-cd">
										<?php
										the_sub_field( 'first_name' );
										( get_sub_field( 'name_separator' ) ) ? the_sub_field( 'name_separator' ) : ' ';
										?>
									</span>
									<span class="ff-hn lighter"><?php the_sub_field( 'last_name' ); ?></span>
								</h3>
								<h6 class="people-section__position primary-color bold ff-hn"><?php the_sub_field( 'position' ); ?></h6>
							</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</main>
		</div>
	</div>
	<!-- /Page Content -->

	<!-- Form Section -->
	<div class="hubspot-form-reset form-section" style="background-color:#f6f5f5;">
		<div class="main-container">
			<div class="grid-x grid-margin-x form-wrapper">
				<h3 class="form-title ff-hn secondary-color lighter">Contact us</h3>
				<div class="cell medium-12 large-10 large-offset-1">
					<?php // phpcs:disable ?>
					<!--[if lte IE 8]>
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
					<![endif]-->
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
					<script>
						hbspt.forms.create({
						portalId: "2789668",
						formId: "9d1cacda-e717-45b9-b09f-32fd5291ceb3"
					});
					</script>
					<?php // phpcs:enable ?>
				</div>
			</div>
		</div>
	</div>
	<!-- /Form Section -->

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

	<?php endwhile; ?>

</article>

<?php get_footer(); ?>
