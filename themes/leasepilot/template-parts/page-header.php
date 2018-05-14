<!-- Page header -->
<?php
  $bgImageUrl = is_archive() ? get_field( 'background_image', 'option' ) : get_field( 'background_image' );
?>
<header class="page-header page-header--bg-img" style="background-image:url('<?php echo $bgImageUrl; ?>');">
  <div class="main-container pos-rel">
    <div class="grid-x page-header__content">
      <div class="cell small-12 medium-6 large-5">
        <h1 class="page-title <?php echo is_archive() ? 'page-title__white' : 'page-title__red'; ?>"><?php ( is_archive() ) ? the_field( 'archive_page_title', 'option' ) : the_title(); ?></h1>
        <div class="page-subheading <?php if ( is_archive() ) { echo 'page-subheading__white'; } ?>">
          <?php is_archive() ? the_field( 'page_subheading', 'option' ) : the_field( 'page_subheading' ); ?>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- /Page header -->