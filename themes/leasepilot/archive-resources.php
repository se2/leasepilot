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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
			$default_posts_per_page = get_option( 'posts_per_page' );
			$paged                  = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$resource_query         = new WP_Query(
				array(
					'post_type' => 'resources',
					'paged'     => $paged,
				)
			);
			if ( $resource_query->have_posts() ) :
				while ( $resource_query->have_posts() ) :
					$resource_query->the_post();
					$term = wp_get_post_terms( get_the_ID(), 'resource-category' );
			?>
					<div class="archive-page-item cell small-12 mobile-6 medium-4 large-4 <?php echo esc_attr( $term[0]->slug ); ?>">
						<a href="<?php get_field( 'download_file' ) ? the_field( 'download_file' ) : the_permalink(); ?>">
							<div class="archive-page-bg">
								<img class="archive-page-logo" src="<?php the_field( 'category_avatar', $term[0] ); ?>" alt="<?php the_title(); ?>">
							</div>
						</a>
						<div class="archive-page--learn-more">
							<a class="button button__archive-page" href="<?php get_field( 'download_file' ) ? the_field( 'download_file' ) : the_permalink(); ?>" target="_blank">Download »</a>
						</div>
						<h6 class="archive-page-category bold primary-color ff-hn"><?php echo esc_attr( $term[0]->name ); ?></h6>
						<h3 class="archive-page-name">
							<?php the_title(); ?>
						</h3>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</article>

<?php get_footer(); ?>
