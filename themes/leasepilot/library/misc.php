<?php
// Miscellaneous functions

function the_clean_url() {
  echo esc_attr( get_site_url() );
}
