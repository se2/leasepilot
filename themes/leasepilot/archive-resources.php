<?php
	/**
	 * Resource CPT archive page
	 *
	 * @category   Archive
	 * @package    FoundationPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

get_header(); ?>

<article class="page-wrapper archive-page">

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

	<div class="archive-page resource content-padding">
		<div class="main-container">
			<ul id="resource-filter" class="filter-list nostyle-list">
				<li class="active"><button data-filter="*">All</button></li>
				<?php
				$terms = get_terms(
					array(
						'taxonomy'   => 'resource-category',
						'hide_empty' => false,
					)
				);
				foreach ( $terms as $key => $term ) {
				?>
				<li><button data-filter=".<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_attr( $term->name ); ?></button></li>
				<?php } ?>
			</ul>
			<div id="resource-grid" class="grid-x grid-margin-x">
			<?php

			/*
			 * This limit is to avoid conflict with Settings->Reading->'Blog pages show at most' of WordPress.
			 * DO NOT use -1 to list all for performance issues.
			 * Reference: https://stackoverflow.com/questions/25012474/error-with-posts-per-page-1-when-verify-my-plugin-with-wordpress-plugin-cod
			*/
			$limit                  = 999;
			$default_posts_per_page = get_option( 'posts_per_page' );
			$resource_query         = new WP_Query(
				array(
					'post_type'      => 'resources',
					'posts_per_page' => $limit,
				)
			);
			if ( $resource_query->have_posts() ){
				while ( $resource_query->have_posts() ){
					$resource_query->the_post();
					$term = wp_get_post_terms( get_the_ID(), 'resource-category' );
					$embed = false;
					$id = get_the_ID();
					$title = get_the_title();
					if( get_field( 'enable_hubspot_form_popup' ) && ($embed = get_field( 'hubspot_form_embed_code' ) ) ){
						add_action( 'wp_footer', function () use($embed, $id, $title){
							?>
<!-- Known issue if using data-animation-out -->
<!-- https://github.com/zurb/foundation-sites/issues/10626 -->
<div class="reveal" id="resource-<?php echo $id ?>" data-reveal style="background-color:#f6f5f5;" data-animation-in="ease-in">
	<!-- Form Section -->
	<div class="hubspot-form-reset form-section">
		<div class="grid-x grid-margin-x form-wrapper">
			<h3 class="text-center form-title ff-hn secondary-color lighter">Download <strong><?php echo $title ?></strong></h3>
			<div class="cell small-12">
				<?php echo $embed; ?>
			</div>
		</div>
	</div>
	<!-- /Form Section -->
	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
							<?php
						});
					}
					$link = $embed ? '#!' : (get_field( 'download_file' ) ? get_field( 'download_file' ) : get_permalink());
			?>
				<div class="archive-page-item cell small-12 mobile-6 medium-4 large-4 <?php echo esc_attr( $term[0]->slug ); ?>">
					<a href="<?php echo $link; ?>"
					   <?php if( $embed ){ ?>data-open="resource-<?php echo $id; ?>" <?php } ?>
					>
						<div class="archive-page-bg">
							<img class="archive-page-logo" src="<?php the_field( 'category_avatar', $term[0] ); ?>" alt="<?php the_title(); ?>">
						</div>
					</a>
					<div class="archive-page--learn-more">
						<a class="button button__archive-page"
						   href="<?php echo $link; ?>"
						   <?php if( $embed ){ ?>data-open="resource-<?php echo $id; ?>" <?php } ?>
						>
							<?php echo !empty($term) && $term[0]->slug === 'case-study' ? 'Review' : 'Download' ?> »
						</a>
					</div>
					<h6 class="archive-page-category bold primary-color ff-hn">
						<?php echo esc_attr( $term[0]->name ); ?>
					</h6>
					<h3 class="archive-page-name">
						<?php the_title(); ?>
					</h3>
				</div>
				<?php } ?>
			<?php } ?>
			</div>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</article>

<?php get_footer(); ?>
