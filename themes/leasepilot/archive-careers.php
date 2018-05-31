<?php
	/**
	 * Careers CPT archive page
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

	<div class="archive-page careers archive-page__intro" style="background-color:#f6f5f5;">
		<div class="main-container">
			<h3 class="ff-hn text-center lighter"><?php the_field(  'c_intro_title', 'option' ); ?></h3>
      <?php the_field( 'c_intro_content', 'option' ); ?>
		</div>
	</div>

	<div class="archive-page--careers content-padding">
		<div class="main-container">
			<h3 class="ff-hn text-center lighter">Open Positions</h3>
			<div class="posts-container">
			<?php
			$paged        = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$career_query = new WP_Query(
				array(
					'post_type' => 'careers',
					'paged'     => $paged,
				)
			);
			if ( $career_query->have_posts() ) :
				while ( $career_query->have_posts() ) :
					$career_query->the_post();
			?>
			<div class="archive-page-item">
				<div class="grid-x">
					<div class="cell medium-2">
						<div class="pos-rel archive-page-bg" style="background-color:#3d4543;">
							<h1 class="ff-cdisp white-color abs-center text-center"><?php the_field( 'initials' ); ?></h1>
						</div>
					</div>
					<div class="cell medium-10 archive-page--careers__info">
						<h3 class="ff-hn archive-page-name lighter"><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
						<a class="small bold primary-color" href="<?php the_permalink(); ?>">Click for job details »</a>
					</div>
				</div>
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
