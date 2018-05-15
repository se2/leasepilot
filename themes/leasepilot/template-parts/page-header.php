<!-- Page header -->
<header class="page-header page-header--bg-img" style="background-image:url('<?php the_field( 'background_image' ); ?>');">
  <div class="main-container pos-rel">
    <div class="grid-x page-header__content page-header__content--singular">
      <div class="cell small-12 medium-6 large-5">
        <?php if ( is_singular( 'case-study' ) && get_field( 'case_study_logo_single' ) ) : ?>
        <img src="<?php the_field( 'case_study_logo_single' ); ?>" alt="<?php the_title(); ?>" class="case-study-logo case-study-logo--singular">
        <?php else: ?>
        <h1 class="page-title" style="color:<?php the_field( 'page_title_color' ); ?>"><?php the_title(); ?></h1>
        <?php endif; ?>
        <div class="page-subheading">
          <?php the_field( 'page_subheading' ); ?>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- /Page header -->