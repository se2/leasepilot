<?php
	/**
	 * Single Resource
	 *
	 * @category   Single
	 * @package    FoundationPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

get_header(); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

	<?php get_template_part( 'template-parts/page', 'blocks' ); ?>

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</article>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
