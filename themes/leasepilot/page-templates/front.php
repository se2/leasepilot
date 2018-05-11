<?php
/*
 * Template Name: Front
 */

get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section class="front-hero" role="main">

</section>

<!-- <section class="red-bg front-subhero">
  <div class="grid-container">
    <div class="grid-x flex-center-items">
      <div class="cell medium-10">
        <h3 class="light">
          LeasePilot is a document automation platform that reframes the familiar, for a greater ROI.
        </h3>
        <h3 class="bold"><a href="#!">Request a Demo »</a></h3>
      </div>
      <div class="cell medium-2">
        <img src="<?php // echo get_template_directory_uri(); ?>/dist/assets/images/image-front-1.png" alt="">
      </div>
    </div>
  </div>
</section> -->

<?php endwhile; ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer(); ?>
