<?php
/*
 * Template Name: Case Studies Page
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

  <div class="case-study content-padding">
    <div class="main-container">
      <div class="grid-x">
        <div class="case-study-grid small-12 medium-12 large-12 cell">
          <div class="grid-x grid-margin-x case-studies-wrapper">
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
              <div class="case-study-item cell small-12 mobile-6 medium-4 large-4">
                <a href="<?php the_permalink(); ?>">
                  <div class="case-study-bg">
                    <img class="case-study-logo" src="<?php the_field( 'case_study_logo' ); ?>" alt="<?php the_title(); ?>">
                    <img class="case-study-cover" src="<?php the_field( 'case_study_cover' ); ?>" alt="<?php the_title(); ?>">
                  </div>
                </a>
                <div class="case-study--learn-more">
                  <a class="button button__case-study" href="<?php the_permalink(); ?>">Read the Study »</a>
                </div>
                <h3 class="case-study-name">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>
              </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
        <?php wp_reset_query(); ?>
      </div>
    </div>
  </div>

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</article>

<?php get_footer(); ?>