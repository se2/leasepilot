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

	<div class="archive-page--careers content-padding">
		<div class="main-container">
			<div class="grid-x grid-margin-x">
				<div class="cell small-12 medium-9 stack-down">
					<div class="posts-container">
						<?php
						$paged      = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
						$post_query = new WP_Query(
							array(
								'post_type' => 'post',
								'paged'     => $paged,
							)
						);
						if ( $post_query->have_posts() ) :
							while ( $post_query->have_posts() ) :
								$post_query->the_post();
								$thumb_url  = get_the_post_thumbnail_url( get_the_ID(), 'large' );
								$background = ( $thumb_url ) ? 'background-image:url("' . $thumb_url . '");' : 'background-color:#3d4543;';
						?>
						<div class="archive-page-item">
							<div class="grid-x">
								<div class="cell medium-3">
									<div class="pos-rel archive-page-bg bg-cover bg-center grayscale" style="<?php echo esc_attr( $background ); ?>"></div>
								</div>
								<div class="cell medium-9 archive-page--careers__info">
									<a class="secondary-color" href="<?php the_permalink(); ?>"><h3 class="ff-hn archive-page-name lighter"><?php the_title(); ?></h3></a>
									<p><?php the_date( 'F j, Y' ); ?></p>
									<?php the_excerpt(); ?>
									<a class="small bold primary-color" href="<?php the_permalink(); ?>">Read More »</a>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<?php wp_reset_postdata(); ?>
					<br><br>
					<?php
					if ( function_exists( 'foundationpress_pagination' ) ) :
						foundationpress_pagination();
					elseif ( is_paged() ) :
					?>
					<nav id="post-nav">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
					</nav>
					<?php endif; ?>
				</div>
				<div class="cell small-12 medium-3 stack-up">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</article>

<?php get_footer(); ?>
