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
				<a href="<?php the_sub_field( 'cta_button_link' ); ?>" class="button button__primary mb0"><?php the_sub_field( 'cta_button_title' ); ?></a>
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
			<div class="cell large-12 small-12 medium-12">
				<h3 class="lighter ff-hn cta-section__title" style="color:<?php the_sub_field( 'text_color' ); ?>"><?php the_sub_field( 'block_title' ); ?></h3>
				<p class="mb0 cta-section__content" style="color:<?php the_sub_field( 'text_color' ); ?>"><?php the_sub_field( 'block_content' ); ?></p>
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
<div class="page-block page-block--compare pos-rel bg-cover section-compare no-overflow" style="background-image:url('<?php the_sub_field( 'background_image' ); ?>');">
	<div class="main-container h100p">
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
		<h3 class="white-color text-center ff-hn lighter"><?php the_sub_field( 'block_title' ); ?></h3>
		<?php
		$case_study_id    = 13;
		$case_study_query = new WP_Query(
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
		<div class="testimonial-slider hide-for-small-only hide-for-mobile-only" id="testimonial-slider">
			<?php
			while ( $case_study_query->have_posts() ) :
				$case_study_query->the_post();
			?>
			<div class="grid-x testimonial-item flex-center-items">
				<div class="cell medium-4">
					<img src="<?php the_field( 'case_study_logo_slider' ); ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="cell medium-7">
					<p class="ff-hn" style="color:<?php the_sub_field( 'text_color' ); ?>"><?php the_field( 'testimonial' ); ?></p>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<div class="logo-slider" id="case-study-slider">
			<?php
			$index = 0;
			while ( $case_study_query->have_posts() ) :
				$case_study_query->the_post();
			?>
			<div class="logo-item">
				<a class="js-logo-click" data-index="<?php echo esc_attr( $index ); ?>">
					<img src="<?php the_field( 'case_study_logo_slider' ); ?>" alt="<?php the_title(); ?>">
				</a>
				<p class="ff-hn hide-for-medium white-color"><?php the_field( 'testimonial' ); ?></p>
			</div>
			<?php
				$index++;
			endwhile;
			?>
		</div>
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
				$post_obj = $post['post_object'];
				$layout   = ( '2col' === $post['post_layout'] ) ? 'small-12 mobile-12 medium-6' : 'small-12 mobile-6 medium-3';
			?>
			<div class="cell bg-cover no-overflow pos-rel h100p <?php echo esc_attr( $layout ); ?>" style="background-image:url('<?php echo esc_attr( get_the_post_thumbnail_url( $post_obj, 'large' ) ); ?>');">
				<p><a class="white-color bold" href="<?php the_permalink( $post_obj->ID ); ?>"><?php echo esc_html( $post_obj->post_title ); ?> »</a></p>
				<div class="gradient-overlay"></div>
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
?>
<!-- 2-column section -->
<div class="page-block page-block--2-cols" style="background-color:<?php the_sub_field( 'background_color' ); ?>;">
	<div class="main-container">
		<div class="grid-x grid-margin-x flex-center-items">
			<div class="cell page-block--2-cols__left small-12 medium-8 stack-down">
				<h3 class="ff-hn lighter page-block--2-cols__title"><?php the_sub_field( 'block_title' ); ?></h3>
				<p style="color:<?php the_sub_field( 'text_color' ); ?>;"><?php the_sub_field( 'block_subtitle' ); ?></p>
				<?php if ( 'content_image' === get_sub_field( 'layout' ) ) : ?>
				<a href="<?php the_sub_field( 'cta_link' ); ?>" class="button button__primary mb0"><?php the_sub_field( 'cta_title' ); ?></a>
				<?php endif; ?>
			</div>
			<?php if ( 'content_image' === get_sub_field( 'layout' ) ) : ?>
			<div class="cell page-block--2-cols--img page-block--2-cols__right small-12 medium-4 text-right stack-up">
				<img src="<?php the_sub_field( 'cta_image' ); ?>" alt="<?php the_sub_field( 'block_title' ); ?>" class="<?php echo ( 'yes' === get_sub_field( 'image_box_shadow' ) ) ? 'box-shadow' : ''; ?>">
			</div>
			<?php else : ?>
			<div class="cell page-block--2-cols__right small-12 medium-4 text-center stack-down">
				<a href="<?php the_sub_field( 'cta_link' ); ?>" class="button button__primary mb0"><?php the_sub_field( 'cta_title' ); ?></a>
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
$type        = get_sub_field( 'animation_type' );
$type_class  = 'section-img-crop';
$right_class = 'medium-offset-2 large-offset-5 xlarge-offset-4 text-right';
switch ( $type ) {
	case 'bar':
		$type_class = 'section-bar';
		break;
	case 'fade':
		$type_class = 'section-computer';
		break;
	default:
		break;
}
?>
<div class="page-block page-block--animated page-block--animated--right pos-rel <?php echo esc_attr( $type_class ); ?>" style="background-color:<?php the_sub_field( 'background_color' ); ?>;">
	<?php if ( 'slide' === $type ) : ?>
	<div class="h100p inner-div-bg img-crop">
		<img src="<?php the_sub_field( 'background_image' ); ?>" alt="<?php the_sub_field( 'block_title' ); ?>" class="bg-image">
	</div>
	<?php endif; ?>
	<?php if ( 'fade' === $type ) : ?>
	<div class="h100p inner-div-bg inner-div-bg--fade page-block--animated--right bg-cover" style="background-image:url('<?php the_sub_field( 'background_image' ); ?>');"></div>
	<img class="computer-img hide-for-small-only hide-for-mobile-only " src="<?php the_sub_field( 'block_image' ); ?>" alt="<?php the_sub_field( 'block_title' ); ?>">
	<?php endif; ?>
	<?php if ( 'bar' === $type ) : ?>
	<div class="inner-div-bg bars bg-cover page-block--animated--left hide-for-mobile-only hide-for-small-only" style="background-image:url('<?php the_sub_field( 'background_image' ); ?>');">
	<?php
	$bars = ( get_sub_field( 'bars' ) ) ? explode( ',', get_sub_field( 'bars' ) ) : array( 10, 20, 35, 55, 85 );
	sort( $bars );
	foreach ( $bars as $key => $bar ) {
	?>
	<div class="bar__outer" style="height:<?php echo esc_attr( $bar ); ?>%;">
		<div class="bar__inner"></div>
	</div>
	<?php } ?>
	</div>
	<?php endif; ?>
	<div class="main-container h100p pos-rel">
		<div class="grid-x h100p">
			<div class="cell small-12 medium-10 large-7 xlarge-8 <?php echo ( 'right' === get_sub_field( 'text_layout' ) ) ? esc_attr( $right_class ) : ''; ?>">
				<h3 class="secondary-color"><?php the_sub_field( 'block_title' ); ?> <span class="lighter ff-hn"><?php the_sub_field( 'block_subtitle' ); ?></span></h3>
				<p class="secondary-color"><?php the_sub_field( 'block_description' ); ?></p>
				<a href="<?php the_sub_field( 'cta_link' ); ?>" class="button button__cta button__cta--dark"><?php the_sub_field( 'cta_title' ); ?></a>
			</div>
		</div>
	</div>
	<img class="hide-for-medium hide-for-medium-up animated-mobile-img" src="<?php the_sub_field( 'mobile_image' ); ?>" alt="<?php the_sub_field( 'block_title' ); ?>">
</div>
<!-- /Animated section -->
<?php
				break;
			case 'features_block':
?>
<!-- Product Features Section -->
<?php
	$features = get_sub_field( 'feature' );
	$width    = floor( 12 / sizeof( $features ) );
?>
<div class="product-features pos-rel">
	<div class="main-container h100p">
		<div class="grid-x h100p flex-center-items">
			<?php foreach ($features as $key => $feature) : ?>
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
			<?php else: ?>
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
				<!--[if lte IE 8]>
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
				<![endif]-->
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
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
?>
<!-- Form Section -->
<div class="hubspot-form-reset form-section" style="background-color:<?php the_sub_field( 'background_color' ); ?>;">
	<div class="main-container">
		<div class="grid-x grid-margin-x form-wrapper">
			<h3 class="form-title ff-hn secondary-color lighter"><?php the_sub_field( 'block_title' ); ?></h3>
			<div class="cell medium-12 large-10 large-offset-1">
				<?php // phpcs:disable ?>
				<!--[if lte IE 8]>
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
				<![endif]-->
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
				<script>
					hbspt.forms.create({
						portalId: "<?php the_sub_field( 'hubspot_portalid' ); ?>",
						formId: "<?php the_sub_field( 'hubspot_formid' ); ?>"
				});
				</script>
				<?php // phpcs:enable ?>
			</div>
		</div>
	</div>
</div>
<!-- /Form Section -->
<?php
				break;
			default:
				break;
		}
	endwhile;
}
?>
