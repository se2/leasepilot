<?php

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_sub_page(array(
		'page_title'  => 'Resources Archive Page',
		'menu_title'  => 'Resources Archive Page',
		'parent_slug' => 'edit.php?post_type=resources',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Careers Archive Page',
		'menu_title'  => 'Careers Archive Page',
		'parent_slug' => 'edit.php?post_type=careers',
	));

}

?>
