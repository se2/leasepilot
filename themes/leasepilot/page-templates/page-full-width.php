<?php
	/**
	 * Template Name: Full Width
	 *
	 * @category   Template
	 * @package    FoundationPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php
			while ( have_posts() ) :
				the_post();
			?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>

<?php get_footer(); ?>
