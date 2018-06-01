<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

	<div class="content-padding">
		<div class="main-container">
			<?php the_content(); ?>
			<?php the_socials_share(); ?>
		</div>
	</div>
	<?php if ( comments_open() ) : ?>
	<div class="comments-section">
		<?php comments_template(); ?>
	</div>
	<?php endif; ?>
	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</article>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
