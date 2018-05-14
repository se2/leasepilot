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

	<!-- Page header -->
	<header class="page-header page-header--bg-img" style="background-image:url('<?php the_field( 'background_image' ); ?>');">
		<div class="main-container pos-rel">
			<div class="grid-x page-header__content">
				<div class="cell small-12 large-5">
					<h1 class="page-title page-title__red"><?php the_title(); ?></h1>
					<?php if ( get_field( 'page_subheading' ) ) : ?>
					<div class="page-subheading">
						<?php the_field( 'page_subheading' ); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
	<!-- /Page header -->

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

	<!-- Page Footer -->
	<div class="main-container">
		<div class="main-grid">
			<footer>
				<?php
					wp_link_pages(
						array(
							'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
							'after'  => '</p></nav>',
						)
					);
				?>
				<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
			</footer>
		</div>
	</div>
	<!-- /Page Footer -->

</article>
