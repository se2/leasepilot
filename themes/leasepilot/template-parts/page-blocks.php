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

if ( have_rows( 'page_blocks' ) ) {
	$posts_per_page = get_option( 'posts_per_page' );
	$paged          = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	while ( have_rows( 'page_blocks' ) ) :
		the_row();
		switch ( get_row_layout() ) {
			case 'big_heading_block':
?>
<!-- Big text block -->
<div class="page-block page-block--big-text" style="background-color:<?php the_sub_field( 'block_background_color' ); ?>;">
	<div class="main-container">
		<div class="grid-x">
			<div class="cell small-12 medium-9">
				<h1 class="ff-hn lighter" style="color:<?php the_sub_field( 'text_color' ); ?>"><?php the_sub_field( 'big_heading' ); ?></h1>
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
<div class="page-block page-block--text-quote" style="background-color:<?php the_sub_field( 'block_background_color' ); ?>;">
	<div class="main-container">
		<div class="grid-x grid-margin-x">
			<div class="cell medium-4">
				<h3 class="ff-cd primary-color"><?php the_sub_field( 'block_title' ); ?></h3>
				<h4 class="quote secondary-color"><?php the_sub_field( 'block_quote' ); ?></h4>
			</div>
			<div class="cell medium-8"><?php the_sub_field( 'block_content' ); ?></div>
		</div>
	</div>
</div>
<!-- /Text Quote block -->
<?php
				break;
			case 'cta_block':
?>
<!-- Block CTA -->
<div class="page-block page-block--cta-img <?php echo ( 'bottom' === get_sub_field( 'image_vertical_align' ) ) ? 'page-block--cta-img--img-bottom' : ''; ?>" style="background-color:<?php the_sub_field( 'block_background_color' ); ?>;">
	<div class="main-container">
		<div class="grid-x grid-margin-x flex-center-items">
			<div class="cell medium-7 <?php echo ( 'bottom' === get_sub_field( 'image_vertical_align' ) ) ? 'large-7' : 'large-7'; ?> page-block--cta-img__img-wrapper">
				<img src="<?php the_sub_field( 'cta_image' ); ?>" alt="<?php the_title(); ?>" class="<?php echo ( get_sub_field( 'cta_mobile_image' ) ) ? 'show-for-medium' : ''; ?>">
				<?php if ( get_sub_field( 'cta_mobile_image' ) ) : ?>
				<img src="<?php the_sub_field( 'cta_mobile_image' ); ?>" alt="<?php the_title(); ?>" class="hide-for-medium">
				<?php endif; ?>
			</div>
			<div class="cell medium-5 <?php echo ( 'bottom' === get_sub_field( 'image_vertical_align' ) ) ? 'large-5' : 'large-5'; ?> page-block--cta-img__content-wrapper">
				<h2 style="color:<?php the_sub_field( 'text_color' ); ?>">
					<?php the_sub_field( 'cta_title' ); ?>
					<span class="lighter ff-hn"><?php the_sub_field( 'cta_subtitle' ); ?></span>
				</h2>
				<p style="color:<?php the_sub_field( 'text_color' ); ?>"><?php the_sub_field( 'cta_description' ); ?></p>
				<?php if ( get_sub_field( 'hubspot_form_popup' ) ) : ?>
					<?php $modal_id = 'request-demo'; ?>
					<?php if( ($code = get_sub_field( 'hubspot_form_code' )) ) : ?>
						<?php $modal_id = 'cta-modal-'.get_row_index(); ?>
						<?php $modal_title = get_sub_field( 'hubspot_modal_title' ) ? get_sub_field( 'hubspot_modal_title' ) : get_sub_field( 'cta_button_title' ); ?>
						<?php add_action( 'wp_footer', function() use ($code, $modal_id, $modal_title){ ?>
<!-- Known issue if using data-animation-out -->
<!-- https://github.com/zurb/foundation-sites/issues/10626 -->
<div class="reveal" id="<?php echo $modal_id ?>" data-reveal style="background-color:#f6f5f5;" data-animation-in="ease-in">
	<!-- Form Section -->
	<div class="hubspot-form-reset form-section">
		<div class="grid-x grid-margin-x form-wrapper">
			<h3 class="text-center form-title ff-hn secondary-color lighter"><?php echo $modal_title; ?></h3>
			<div class="cell small-12">
				<?php echo $code; ?>
			</div>
		</div>
	</div>
	<!-- /Form Section -->
	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
						<?php }); ?>
					<?php endif; ?>
				<a class="button button__primary mb0" href="#!" data-open="<?php echo $modal_id ?>"><?php the_sub_field( 'cta_button_title' ); ?></a>
				<?php else : ?>
				<a class="button button__primary mb0" href="<?php the_sub_field( 'cta_button_link' ); ?>"><?php the_sub_field( 'cta_button_title' ); ?></a>
				<?php endif; ?>
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
<div class="page-block cta-section cta-section--secondary" style="background-color:<?php the_sub_field( 'block_background_color' ); ?>">
	<div class="main-container">
		<div class="grid-x">
			<div class="cell small-12 medium-10 medium-offset-1">
				<h3 class="lighter ff-hn cta-section__title" style="color:<?php the_sub_field( 'text_color' ); ?>"><?php the_sub_field( 'block_title' ); ?></h3>
				<p class="mb0 cta-section__content" style="color:<?php the_sub_field( 'text_color' ); ?>"><?php the_sub_field( 'block_content' ); ?></p>
				<?php if ( get_sub_field( 'cta_button_title' ) ) : ?>
					<?php if ( get_sub_field( 'hubspot_form_popup' ) ) : ?>
					<a class="button button__primary mb0" href="#!" data-open="request-demo"><?php the_sub_field( 'cta_button_title' ); ?></a>
					<?php else : ?>
					<a class="button button__primary mb0" href="<?php the_sub_field( 'cta_button_link' ); ?>"><?php the_sub_field( 'cta_button_title' ); ?></a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- /Text background section -->
<?php
				break;
			case 'comparison_block':
?>
<!-- Comparison section -->
<div class="page-block page-block--compare pos-rel bg-cover section-compare no-overflow first-time" style="background-image:url('<?php the_sub_field( 'background_image' ); ?>');">
	<div class="main-container h100p" style="max-width: 900px;">
		<div class="grid-x pos-rel flex-center-items">
			<div class="cell small-12 medium-5 medium-offset-1 large-6 large-offset-0 xlarge-4 page-block--compare__left">
				<h2 class="secondary-color"><?php the_sub_field( 'block_title' ); ?></h2>
				<p class="secondary-color"><?php the_sub_field( 'block_content' ); ?></p>
				<?php if ( get_sub_field( 'cta_title' ) && get_sub_field( 'cta_link' ) ) : ?>
				<a href="<?php the_sub_field( 'cta_link' ); ?>" class="button button__cta button__cta--dark mb0"><?php the_sub_field( 'cta_title' ); ?></a>
				<?php endif; ?>
			</div>
			<div class="cell small-12 medium-5 large-6 xlarge-6 xlarge-offset-2 page-block--compare__right ba-slider">
				<div class="before h100p">
					<img src="<?php the_sub_field( 'before_image' ); ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="resize no-overflow after h100p">
					<img src="<?php the_sub_field( 'after_image' ); ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="handle">
					<img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/dist/assets/images/handle.png" alt="<?php the_title(); ?>">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Comparison section -->
<?php
				break;
			case 'testimonial_block':
?>
<!-- Testimonials section -->
<div class="page-block page-block--testimonials pos-rel" style="background-color:<?php the_sub_field( 'background_color' ); ?>;">
	<div class="main-container">
		<h3 class="white-color text-center ff-hn lighter lh1"><?php the_sub_field( 'block_title' ); ?></h3>
		<?php
		$case_study_id      = 13;
		$testimonials_count = 0;
		$case_study_query   = new WP_Query(
			array(
				'post_type' => 'resources',
				'paged'     => $paged,
				'order'     => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => 'resource-category',
						'field'    => 'term_id',
						'terms'    => $case_study_id,
						'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
					),
				),
			)
		);
		if ( $case_study_query->have_posts() ) :
		?>
		<div class="testimonial-slider " id="testimonial-slider">
			<?php
			while ( $case_study_query->have_posts() ) :
				$case_study_query->the_post();
				if ( get_field( 'testimonial' ) ) :
					$testimonials_count++;
			?>
			<div class="grid-x testimonial-item flex-center-items">
				<div class="cell medium-4 mb40-mobile">
					<img src="<?php the_field( 'case_study_logo_slider' ); ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="cell medium-7 text-center--mobile">
					<p class="ff-hn" style="color:<?php the_sub_field( 'text_color' ); ?>"><?php the_field( 'testimonial' ); ?></p>
				</div>
			</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
		<?php if ( $testimonials_count > 1 ) : ?>
		<div class="logo-slider show-for-medium" id="case-study-slider">
			<?php
			$index = 0;
			while ( $case_study_query->have_posts() ) :
				$case_study_query->the_post();
				if ( get_field( 'testimonial' ) ) :
			?>
			<div class="logo-item">
				<a class="js-logo-click" data-index="<?php echo esc_attr( $index ); ?>">
					<img src="<?php the_field( 'case_study_logo_slider' ); ?>" alt="<?php the_title(); ?>">
				</a>
				<p class="ff-hn hide-for-medium white-color"><?php the_field( 'testimonial' ); ?></p>
			</div>
			<?php
					$index++;
				endif;
			endwhile;
			?>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>
<!-- /Testimonials section -->
<?php
				break;
			case 'posts_block':
?>
<!-- Posts section -->
<div class="page-block page-block--posts">
	<div class="main-content-full-width">
		<div class="grid-x">
			<?php
			$posts = get_sub_field( 'post' );
			if ( $posts ) :
				foreach ( $posts as $key => $post ) :
					$post_obj       = $post['post_object'];
					$post_thumbnail = get_field( 'featured_image_home', $post_obj->ID ) ? get_field( 'featured_image_home', $post_obj->ID ) : get_the_post_thumbnail_url( $post_obj, 'large' );
					$layout         = ( '2col' === $post['post_layout'] ) ? 'small-12 mobile-12 medium-6 featured' : 'small-12 mobile-6 medium-3';
			?>
			<div class="cell no-overflow pos-rel h100p <?php echo esc_attr( $layout ); ?>">
				<a class="white-color bold" href="<?php the_permalink( $post_obj->ID ); ?>">
					<div class="bg-cover grayscale bg-image" style="background-image:url('<?php echo esc_attr( $post_thumbnail ); ?>');"></div>
					<div class="blue-overlay"></div>
					<p><?php echo esc_html( $post_obj->post_title ); ?> »</p>
					<div class="gradient-overlay"></div>
				</a>
			</div>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- /Posts section -->
<?php
				break;
			case '2_column_cta_block':
				$is_reverse = get_sub_field( 'reverse_order' );
?>
<!-- 2-column section -->
<div class="page-block page-block--2-cols" style="background-color:<?php the_sub_field( 'background_color' ); ?>;">
	<div class="main-container">
		<div class="grid-x flex-center-items">
			<?php if ( 'image_content' === get_sub_field( 'layout' ) ) : ?>
			<div class="cell page-block--2-cols--img small-12 medium-5 stack-up <?php echo ( $is_reverse ) ? 'stack-down-medium page-block--2-cols__right' : 'page-block--2-cols__left text-right'; ?>">
				<img src="<?php the_sub_field( 'cta_image' ); ?>" alt="<?php the_sub_field( 'block_title' ); ?>" class="<?php echo ( 'yes' === get_sub_field( 'image_box_shadow' ) ) ? 'box-shadow' : ''; ?>">
			</div>
			<div class="cell small-12 medium-7 large-offset-1 large-6 stack-down <?php echo ( $is_reverse ) ? 'stack-up-medium' : 'page-block--2-cols__right'; ?>">
				<h3 style="color:<?php the_sub_field( 'text_color' ); ?>;" class="ff-hn lighter page-block--2-cols__title"><?php the_sub_field( 'block_title' ); ?></h3>
				<p style="color:<?php the_sub_field( 'text_color' ); ?>;"><?php the_sub_field( 'block_subtitle' ); ?></p>
				<?php if ( 'image_content' === get_sub_field( 'layout' ) ) : ?>
					<?php if ( get_sub_field( 'hubspot_form_popup' ) ) : ?>
					<a class="button button__primary mb0" href="#!" data-open="request-demo"><?php the_sub_field( 'cta_title' ); ?></a>
					<?php else : ?>
					<a class="button button__primary mb0" href="<?php the_sub_field( 'cta_link' ); ?>"><?php the_sub_field( 'cta_title' ); ?></a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php else : ?>
			<div class="cell small-12 medium-7 large-6 stack-down <?php echo ( $is_reverse ) ? 'stack-down-medium' : ''; ?>">
				<h3 style="color:<?php the_sub_field( 'text_color' ); ?>;" class="ff-hn lighter page-block--2-cols__title"><?php the_sub_field( 'block_title' ); ?></h3>
				<p style="color:<?php the_sub_field( 'text_color' ); ?>;"><?php the_sub_field( 'block_subtitle' ); ?></p>
			</div>
			<div class="cell small-12 medium-5 large-6 stack-down <?php echo ( $is_reverse ) ? 'stack-up-medium' : 'page-block--2-cols__right text-center'; ?>">
				<?php if ( get_sub_field( 'hubspot_form_popup' ) ) : ?>
				<a class="button button__primary mb0" href="#!" data-open="request-demo"><?php the_sub_field( 'cta_title' ); ?></a>
				<?php else : ?>
				<a class="button button__primary mb0" href="<?php the_sub_field( 'cta_link' ); ?>"><?php the_sub_field( 'cta_title' ); ?></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- /2-column section -->
<?php
				break;
			case 'animated_background_block':
?>
<!-- Animated section -->
<?php
$layout      = get_sub_field( 'text_layout' );
$mobile_img  = get_sub_field( 'mobile_image' ) ? get_sub_field( 'mobile_image' ) : get_sub_field( 'background_image' );
$disable     = get_sub_field( 'faded_background' ) ? '' : 'animated--disable';
?>
<div class="page-block page-block--animated pos-rel <?php echo ( 'right' === $layout ) ? 'page-block--animated--right' : ''; ?> <?php echo esc_attr( $disable ); ?>" style="background-color:<?php the_sub_field( 'background_color' ); ?>;">
	<div class="h100p inner-div-bg bg-contain" style="background-image:url('<?php the_sub_field( 'background_image' ); ?>');"></div>
	<div class="main-container h100p pos-rel">
		<div class="grid-x h100p">
			<div class="cell small-12 medium-9 large-7 xlarge-6">
				<h3 class="secondary-color"><?php the_sub_field( 'block_title' ); ?> <span class="lighter ff-hn"><?php the_sub_field( 'block_subtitle' ); ?></span></h3>
				<p class="secondary-color"><?php the_sub_field( 'block_description' ); ?></p>
				<?php if ( get_sub_field( 'cta_link' ) && get_sub_field( 'cta_title' ) ) : ?>
				<a href="<?php the_sub_field( 'cta_link' ); ?>" class="button button__cta button__cta--dark"><?php the_sub_field( 'cta_title' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php if ( $mobile_img ) : ?>
	<img class="hide-for-medium hide-for-medium-up animated-mobile-img" src="<?php echo esc_attr( $mobile_img ); ?>" alt="<?php echo strip_tags( get_sub_field( 'block_title' ) ); ?>">
	<?php endif; ?>
</div>
<!-- /Animated section -->
<?php
				break;
			case 'features_block':
?>
<!-- Product Features Section -->
<?php
	$features = get_sub_field( 'feature' );
	$width    = floor( 12 / count( $features ) );
?>
<div class="product-features pos-rel">
	<div class="main-container h100p">
		<div class="grid-x h100p flex-center-items">
			<?php foreach ( $features as $key => $feature ) : ?>
			<div class="cell product-features__cell small-12 medium-<?php echo esc_attr( $width ); ?> large-<?php echo esc_attr( $width ); ?>">
				<img src="<?php echo esc_attr( $feature['feature_icon'] ); ?>" alt="">
				<h3><?php echo esc_html( $feature['feature_title'] ); ?><br><span class="lighter ff-hn"><?php echo esc_html( $feature['feature_subtitle'] ); ?></span></h3>
				<p><?php echo esc_html( $feature['feature_description'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!-- /Product Features Section -->
<?php
				break;
			case 'product_step_block':
				$layout       = get_sub_field( 'step_layout' );
				$image_layout = get_sub_field( 'image_layout' );
?>
<!-- Step Block -->
<div class="page-block page-block--animated pos-rel no-overflow product-child" style="background-color:<?php the_sub_field( 'background_color' ); ?>;">
	<div class="main-container h100p pos-rel">
		<div class="grid-x grid-margin-x h100p">
			<?php if ( 'image_content' === $layout ) : ?>
			<div class="cell small-12 medium-6 large-5 pos-rel stack-up">
				<img src="<?php the_sub_field( 'step_image' ); ?>" class="product-image product-image--boxed box-shadow <?php echo ( 'full' === $image_layout ) ? 'hide-for-medium hide-for-medium-up' : ''; ?>" alt="">
			</div>
			<div class="cell small-12 medium-6 large-6 large-offset-1 stack-down text-right">
				<h3><?php the_sub_field( 'step_title' ); ?><br><span class="lighter ff-hn"><?php the_sub_field( 'step_subtitle' ); ?></span></h3>
				<p><?php the_sub_field( 'step_content' ); ?></p>
				<?php if ( get_sub_field( 'cta_title' ) && get_sub_field( 'cta_link' ) ) : ?>
				<a href="<?php the_sub_field( 'cta_link' ); ?>" class="button button__cta button__cta--dark"><?php the_sub_field( 'cta_title' ); ?></a>
				<?php endif; ?>
			</div>
			<?php else : ?>
			<div class="cell small-12 medium-6 large-6 stack-down">
				<h3><?php the_sub_field( 'step_title' ); ?><br><span class="lighter ff-hn"><?php the_sub_field( 'step_subtitle' ); ?></span></h3>
				<p><?php the_sub_field( 'step_content' ); ?></p>
				<?php if ( get_sub_field( 'cta_title' ) && get_sub_field( 'cta_link' ) ) : ?>
				<a href="<?php the_sub_field( 'cta_link' ); ?>" class="button button__cta button__cta--dark"><?php the_sub_field( 'cta_title' ); ?></a>
				<?php endif; ?>
			</div>
			<div class="cell small-12 medium-6 large-5 large-offset-1 pos-rel stack-up">
				<img src="<?php the_sub_field( 'step_image' ); ?>" class="product-image product-image--boxed box-shadow float-right <?php echo ( 'full' === $image_layout ) ? 'hide-for-medium hide-for-medium-up' : ''; ?>" alt="">
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if ( 'full' === $image_layout ) : ?>
	<div class="product-image--full-height bg-cover bg-center-left <?php echo ( 'image_content' === $layout ) ? 'product-image--full-height--left' : ''; ?>" style="background-image:url('<?php the_sub_field( 'step_image' ); ?>;"></div>
	<?php endif; ?>
</div>
<!-- Step Block -->
<?php
				break;
			case 'hubspot_form_cta_block':
?>
<!-- Block CTA -->
<div class="page-block page-block--cta-img page-block--cta-img--img-bottom page-block--cta-img--with-title" style="background-color:<?php the_sub_field( 'background_color' ); ?>;">
	<div class="main-container">
		<div class="grid-x grid-margin-x">
			<div class="cell title">
				<h1 class="fz-30 white-color ff-hn text-center lighter"><?php the_sub_field( 'block_title' ); ?></h1>
				<p class="white-color text-center" style="font-size:24px;">
					<?php the_sub_field( 'block_subtitle' ); ?>
				</p>
			</div>
			<div class="cell medium-6 large-6 page-block--cta-img__img-wrapper">
				<img src="<?php the_clean_url(); ?>/wp-content/uploads/2018/05/cta-img.png" alt="<?php the_title(); ?>">
			</div>
			<div class="cell medium-5 large-5 page-block--cta-img__content-wrapper form-section form-section--1-column">
				<?php // phpcs:disable ?>
				<script>
					hbspt.forms.create({
						portalId: "<?php the_sub_field( 'hubspot_portalid' ); ?>",
						formId: "<?php the_sub_field( 'hubspot_formid' ); ?>",
						css: ""
					});
				</script>
				<?php // phpcs:enable ?>
			</div>
		</div>
	</div>
</div>
<!-- /Block CTA -->
<?php
				break;
			case 'hubspot_form_block':
				$form_gray = '';
				$bg_color  = get_sub_field( 'background_color' );
				$rgb       = HTMLToRGB( $bg_color );
				$hsl       = RGBToHSL( $rgb );
				if ( $hsl->lightness > 250 ) {
					// this is light colour!
					$form_gray = 'form--gray';
				}
?>
<!-- Form Section -->
<div class="hubspot-form-reset form-section <?php echo esc_attr( $form_gray ); ?>" style="background-color:<?php the_sub_field( 'background_color' ); ?>;">
	<div class="main-container">
		<div class="grid-x form-wrapper grid-centered">
			<?php if ( '2_col' === get_sub_field( 'block_layout' ) ) : ?>
			<div class="cell small-12 large-5">
				<?php the_sub_field( 'block_content' ); ?>
			</div>
			<div class="cell small-12 large-6 large-offset-1">
				<?php // phpcs:disable ?>
				<script>
					hbspt.forms.create({
						portalId: "<?php the_sub_field( 'hubspot_portalid' ); ?>",
						formId: "<?php the_sub_field( 'hubspot_formid' ); ?>"
				});
				</script>
				<?php // phpcs:enable ?>
			</div>
			<?php else : ?>
			<div class="cell medium-12 large-10">
				<!-- <h3 class="form-title ff-hn secondary-color lighter"></h3> -->
				<?php the_sub_field( 'block_content' ); ?>
				<?php // phpcs:disable ?>
				<script>
					hbspt.forms.create({
						portalId: "<?php the_sub_field( 'hubspot_portalid' ); ?>",
						formId: "<?php the_sub_field( 'hubspot_formid' ); ?>"
				});
				</script>
				<?php // phpcs:enable ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- /Form Section -->
<?php
				break;
			case 'people_block':
				?>
<!-- People Block -->
<div class="page-block page-block--people">
	<?php
	$founders = 2;
	$index    = 0;
	?>
	<div class="main-container">
		<?php
		if( get_sub_field( 'block_title') ) {
			?>
		<h3 class="ff-hn page-block__title">
			<?php the_sub_field( 'block_title' ); ?>
		</h3>
			<?php
		}
		?>
		<div class="grid-x grid-margin-x people-section grid-centered">
			<?php
			while ( have_rows( 'people' ) && ( $index < $founders ) ) :
				the_row();
			?>
			<div class="cell small-12 medium-4 large-3 people-section__person">
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
				<?php if( get_sub_field( 'linkedin_url' ) || get_sub_field( 'email' ) ){
					?>
				<div class="people-section__links">
					<?php
					if ( get_sub_field( 'email' ) ) {
						echo do_shortcode( '[email]' . get_sub_field( 'email' ) . '[/email]' );
					}
					if( get_sub_field( 'linkedin_url' ) ){
						?>
					<a href="<?php the_sub_field( 'linkedin_url') ?>" target="_blank">
						<span class="icon-linkedin" aria-label="LinkedIn"></span>
					</a>
						<?php
					}
					?>
				</div>
					<?php
				}
				?>
			</div>
			<?php
				$index++;
			endwhile;
			$index = 0;
			?>
		</div>
		<div class="grid-x grid-margin-x people-section grid-centered">
			<?php
			while ( have_rows( 'people' ) ) :
				if ( $index >= $founders ) :
				the_row();
			?>
			<div class="cell small-12 medium-4 large-3 people-section__person">
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
				<?php if( get_sub_field( 'linkedin_url' ) || get_sub_field( 'email' ) ){
					?>
				<div class="people-section__links">
					<?php
					if ( get_sub_field( 'email' ) ) {
						echo do_shortcode( '[email]' . get_sub_field( 'email' ) . '[/email]' );
					}
					if( get_sub_field( 'linkedin_url' ) ){
						?>
					<a href="<?php the_sub_field( 'linkedin_url') ?>" target="_blank">
						<span class="icon-linkedin" aria-label="LinkedIn"></span>
					</a>
						<?php
					}
					?>
				</div>
					<?php
				}
				?>
			</div>
			<?php
				endif;
				$index++;
			endwhile;
			?>
		</div>
	</div>
</div>
<!-- /People Block -->
				<?php
				break;

			default:
				break;
		}
	endwhile;
}
?>
