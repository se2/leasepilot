<!-- Page Footer -->
<div class="main-container">
  <div class="main-grid">
    <footer>
      <?php
        wp_link_pages(
          array(
            'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
            'after'  => '</p></nav>',
          )
        );
      ?>
      <?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
    </footer>
  </div>
</div>
<!-- /Page Footer -->