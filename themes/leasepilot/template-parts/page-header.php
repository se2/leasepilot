<?php
  $bg_type = get_field( 'background' );
  $bg = '';
  $videoId = NULL;
  switch ($bg_type) {
    case 'color':
      $bg = 'background-color:' . get_field( 'background_color' );
      break;
    case 'image':
      $bg = 'background-image:url(' . get_field( 'background_image' ) . ')';
      break;
    case 'video':
      $bg = 'background-image:url(' . get_field( 'background_video_poster' ) . ')';
      $videoId = (int) substr(parse_url(get_field( 'background_video' ), PHP_URL_PATH), 1);
      break;
    default:
      break;
  }
?>
<!-- Page header -->
<header class="page-header page-header--bg-img pos-rel" style="<?php echo $bg; ?>;">
  <?php if ( $bg_type == 'video' ) : ?>
  <video loop muted autoplay playsinline preload="none" class="fullscreen-bg__video">
      <source src="<?php the_field( 'background_video' ); ?>" type="video/mp4">
  </video>
  <?php endif; ?>
  <div class="main-container pos-rel">
    <div class="grid-x page-header__content <?php echo ( is_single() && !is_front_page() ) ? 'page-header__content--singular' : ''; ?>">
      <div class="cell small-12 medium-6 large-5">
        <?php if ( is_singular( 'case-study' ) && get_field( 'case_study_logo_single' ) ) : ?>
        <img src="<?php the_field( 'case_study_logo_single' ); ?>" alt="<?php the_title(); ?>" class="archive-page-logo archive-page-logo--singular">
        <?php else: ?>
        <?php if ( !is_front_page() ) : ?>
        <h1 class="page-title" style="color:<?php the_field( 'page_title_color' ); ?>"><?php the_title(); ?></h1>
        <?php endif; ?>
        <?php endif; ?>
        <div class="page-subheading">
          <?php the_field( 'page_subheading' ); ?>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- /Page header -->