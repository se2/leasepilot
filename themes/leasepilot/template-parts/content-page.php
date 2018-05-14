<?php
/**
 * The default template for displaying page content
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

	<!-- Page Content -->
	<div class="main-container">
		<div class="main-grid">
			<main class="main-content">
				<div class="entry-content">
					<?php the_content(); ?>
					<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</main>
			<?php // get_sidebar(); ?>
		</div>
	</div>
	<!-- /Page Content -->

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</article>
