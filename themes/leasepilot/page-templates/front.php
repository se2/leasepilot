<?php
/*
 * Template Name: Front
 */

get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="page-wrapper">

  <?php get_template_part( 'template-parts/page', 'header' ); ?>

  <!-- Text background section -->
  <div class="cta-section cta-section--secondary">
    <div class="main-container">
      <div class="grid-x">
        <div class="cell large-12 small-12 medium-12">
          <h3 class="lighter fz-30 ff-hn">Harvest the latest intelligence in your leasing process</h3>
          <p class="mb0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet hendrerit libero. Nulla tincidunt, mauris vitae varius sodales, lectus ipsum facilisis arcu, vel feugiat nulla elit consequat lacus.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- /Text background section -->

  <?php get_template_part( 'template-parts/page', 'blocks' ); ?>

</div>

<?php endwhile; ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer(); ?>
