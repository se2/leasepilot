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
	<div class="page-block page-block--big-text">
		<div class="main-container">
			<div class="grid-x">
				<div class="cell small-12">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- /Big text block -->

	<?php get_template_part( 'template-parts/page', 'blocks' ); ?>

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</div>

<?php endwhile; ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer(); ?>
