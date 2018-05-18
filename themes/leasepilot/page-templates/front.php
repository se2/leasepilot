<?php
/*
 * Template Name: Front
 */

get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="page-wrapper">

  <?php get_template_part( 'template-parts/page', 'header' ); ?>

  <!-- 2-column section -->
  <div class="page-block page-block--2-cols" style="background-color:#ffffff;">
    <div class="main-container">
      <div class="grid-x">
        <div class="cell stack-down page-block--2-cols__left small-12 medium-7">
          <h3 class="ff-hn lighter fz-30 page-block--2-cols__title secondary-color">Document automation & data capture for commerical leasing.</h3>
          <p class="secondary-color mb0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet hendrerit libero. Nulla tincidunt, mauris vitae varius.</p>
          <a href="/#!" class="button button__primary mb0">Learn more »</a>
        </div>
        <div class="cell stack-up page-block--2-cols--img page-block--2-cols__right small-12 medium-5 text-right">
          <img src="/wp-content/uploads/2018/05/screenshot_11.png" alt="LeasePilot" class="box-shadow">
        </div>
      </div>
    </div>
  </div>
  <!-- /2-column section -->

  <!-- Animated background section -->
  <div class="page-block page-block--animated-bg page-block--animated-bg--right">
    <div class="h100p img-crop">
      <img src="/wp-content/uploads/2018/05/tailored.png" alt="" class="bg-image">
    </div>
    <div class="main-container h100p">
      <div class="grid-x h100p">
        <div class="cell small-12 medium-7 large-6">
          <h3 class="secondary-color">Tailored for your company’s <span class="lighter ff-hn">documents and process</span></h3>
          <p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consectetur quam quis magna convallis dictum. Sed sapien sapien, tempus.</p>
          <a href="/#!" class="button button__cta--dark">See the product »</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /Animated background section -->

  <!-- Animated background section -->
  <div class="page-block page-block--animated-bg page-block--animated-bg--left bg-cover pos-rel" style="background-image:url('/wp-content/uploads/2018/05/turbocharge.png');">
    <div class="text-right main-container h100p">
      <div class="grid-x h100p">
        <div class="cell small-12 medium-7 large-6 large-offset-6">
          <h3 class="secondary-color">Turbocharge lease<span class="lighter ff-hn"><br>drafting & negotiation</span></h3>
          <p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consectetur quam quis magna convallis dictum. Sed sapien sapien, tempus.</p>
          <a href="/#!" class="button button__cta--dark">See our partners »</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /Animated background section -->

  <!-- Animated background section -->
  <div class="page-block page-block--animated-bg page-block--animated-bg--right bg-cover" style="background-image:url('/wp-content/uploads/2018/05/transform.png');">
    <div class="main-container h100p">
      <div class="grid-x h100p">
        <div class="cell small-12 medium-7 large-6">
          <h3 class="secondary-color">Transform your business <span class="lighter ff-hn">with leasing data</span></h3>
          <p class="secondary-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consectetur quam quis magna convallis dictum. Sed sapien sapien, tempus.</p>
          <a href="/#!" class="button button__cta--dark">Explore features »</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /Animated background section -->

  <!-- 2-column section -->
  <div class="page-block page-block--2-cols" style="background-color:#ffffff;">
    <div class="main-container">
      <div class="grid-x flex-center-items">
        <div class="cell page-block--2-cols__left small-12 medium-7">
          <h3 class="ff-hn lighter page-block--2-cols__title secondary-color">Call-to-action about your company’s latest intelligence</h3>
          <p class="secondary-color mb0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet hendrerit libero. Nulla tincidunt, mauris vitae varius.</p>
        </div>
        <div class="cell page-block--2-cols__right small-12 medium-5 text-center">
          <a href="/#!" class="button button__primary mb0">See what's possible »</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /2-column section -->

  <?php get_template_part( 'template-parts/page', 'blocks' ); ?>

</div>

<?php endwhile; ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer(); ?>
