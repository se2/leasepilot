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
	while ( have_rows( 'case_study_blocks' ) ) :
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
			<div class="cell medium-7 <?php echo ( 'bottom' === get_sub_field( 'image_vertical_align' ) ) ? 'large-8' : 'large-7'; ?> page-block--cta-img__img-wrapper">
				<img src="<?php the_sub_field( 'cta_image' ); ?>" alt="<?php the_title(); ?>">
			</div>
			<div class="cell medium-5 <?php echo ( 'bottom' === get_sub_field( 'image_vertical_align' ) ) ? 'large-4' : 'large-5'; ?> page-block--cta-img__content-wrapper">
				<h2 style="color:<?php the_sub_field( 'text_color' ); ?>">
					<?php the_sub_field( 'cta_title' ); ?>
					<span class="lighter ff-hn"><?php the_sub_field( 'cta_subtitle' ); ?></span>
				</h2>
				<p style="color:<?php the_sub_field( 'text_color' ); ?>"><?php the_sub_field( 'cta_description' ); ?></p>
				<a href="<?php the_sub_field( 'cta_link' ); ?>" class="button button__primary mb0"><?php the_sub_field( 'cta_button_title' ); ?></a>
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
<div class="page-block page-block--compare pos-rel bg-cover" id="section-compare" style="background-image:url('<?php the_sub_field( 'background_image' ); ?>');">
	<div class="main-container h100p">
		<div class="grid-x pos-rel flex-center-items">
			<div class="cell small-12 medium-5 large-4 page-block--compare__left">
				<h2 class="secondary-color"><?php the_sub_field( 'block_title' ); ?></h2>
				<p class="secondary-color"><?php the_sub_field( 'block_content' ); ?></p>
				<?php if ( get_field( 'cta_title' ) && get_field( 'cta_link' ) ) : ?>
				<a href="<?php the_sub_field( 'cta_link' ); ?>" class="button button__cta button__cta--dark mb0"><?php the_sub_field( 'cta_title' ); ?></a>
				<?php endif; ?>
			</div>
			<div class="cell small-12 medium-7 large-6 large-offset-2 ba-slider page-block--compare__right" id="comparison">
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
		$default_posts_per_page = get_option( 'posts_per_page' );
		$paged                  = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$case_study_query       = new WP_Query(
			array(
				'post_type' => 'case-study',
				'paged'     => $paged,
				'order'     => 'ASC',
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
			wp_reset_postdata();
			?>
		</div>
		<?php endif; ?>
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
			$post_query = new WP_Query(
				array(
					'post_type' => 'post',
					'paged'     => $paged,
					'order'     => 'ASC',
				)
			);
			while ( $post_query->have_posts() ) :
				$post_query->the_post();
				$layout = ( is_sticky( get_the_ID() ) ) ? 'small-12 medium-6' : 'small-6 medium-3';
			?>
			<div class="cell bg-cover no-overflow pos-rel h100p <?php echo esc_attr( $layout ); ?>" style="background-image:url('<?php echo esc_attr( get_the_post_thumbnail_url( $post, 'full' ) ); ?>');">
				<p><a class="white-color bold" href="<?php the_permalink(); ?>"><?php the_title(); ?> »</a></p>
				<div class="gradient-overlay"></div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<!-- /Posts section -->
<?php
				break;
			default:
				break;
		}
	endwhile;
}
?>
