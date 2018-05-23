<?php
	/**
	 * Template Name: Product
	 *
	 * @category   Template
	 * @package    FoundationPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>

<?php
while ( have_posts() ) :
	the_post();
?>

<div class="page-wrapper">

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

  <?php
  $right_class = 'medium-offset-5 large-offset-6 text-right';
  $args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
  );
  $parent = new WP_Query( $args );
  if ( $parent->have_posts() ) : ?>
  <?php
    $index = 0;
    while ( $parent->have_posts() ) :
      $parent->the_post();
  ?>
  <div class="page-block page-block--animated page-block--animated--none pos-rel" <?php echo ( $index % 2 == 0 ) ? ' style="background-color:#f6f5f5;"' : ''; ?>>
    <div class="main-container h100p pos-rel">
      <div class="grid-x h100p">
        <div class="cell small-12 medium-7 large-6 <?php echo ( $index % 2 == 0 ) ? esc_attr( $right_class ) : '' ; ?>">
          <h3 class="secondary-color"><?php the_field( 'page_title' ); ?><br><span class="lighter ff-hn"><?php the_field( 'page_subtitle' ); ?></span></h3>
          <p class="secondary-color"><?php the_field( 'page_subheading' ); ?></p>
          <a href="<?php the_permalink(); ?>" class="button button__cta button__cta--dark">Learn more »</a>
        </div>
      </div>
    </div>
  </div>
  <?php
      $index++;
    endwhile;
  ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

	<?php get_template_part( 'template-parts/page', 'footer' ); ?>

</div>

<?php endwhile; ?>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer(); ?>
