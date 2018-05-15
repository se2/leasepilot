<!-- Page header -->
<header class="page-header page-header--bg-img" style="background-image:url('<?php the_field( 'background_image' ); ?>');">
  <div class="main-container pos-rel">
    <div class="grid-x page-header__content">
      <div class="cell small-12 medium-6 large-5">
        <h1 class="page-title" style="color:<?php the_field( 'page_title_color' ); ?>"><?php the_title(); ?></h1>
        <div class="page-subheading">
          <?php the_field( 'page_subheading' ); ?>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- /Page header -->