<?php get_header(); ?>

<div class="page-wrapper">

  <!-- Page Title -->
	<div class="grid-container">
	</div>

	<div class="case-study-container">
		<div class="grid-container">
			<div class="grid-x">
				<div class="case-study-grid small-12 medium-12 large-12 cell">
          <div class="grid-x case-studies-wrapper">
          <?php
            $default_posts_per_page = get_option( 'posts_per_page' );
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $case_study_query = new WP_Query(
              array(
                'post_type' => 'case-study',
                'paged' => $paged
                )
              );
            if ( $case_study_query->have_posts() ) :
              while ( $case_study_query->have_posts() ) : $case_study_query->the_post(); ?>
              <!-- <div class="case-study-item cell small-6 medium-4 large-4">
                <a href="<?php // the_permalink(); ?>">
                  <div class="case-study-bg">
                    <?php // the_post_thumbnail( 'medium' ); ?>
                  </div>
                </a>
                <a href="<?php // the_permalink(); ?>" class="case-study-name">
                  <?php // the_title(); ?>
                </a>
              </div> -->
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
				</div>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>
