<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
	function foundationpress_sidebar_widgets() {
		register_sidebar(
			array(
				'id'            => 'sidebar-widgets',
				'name'          => __( 'Sidebar widgets', 'leasepilot' ),
				'description'   => __( 'Drag widgets to this sidebar container.', 'leasepilot' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>',
			)
		);

		for ($i = 1; $i <= 6 ; $i++) {
			register_sidebar(
				array(
					'id' 						=> 'footer-widget-' . $i,
					'name'          => __( 'Footer column ' . $i, 'leasepilot' ),
					'description'   => __( 'Drag widgets to this footer container', 'leasepilot' ),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' 	=> '</aside>',
					'before_title' 	=> '<h3 class="footer-title">',
					'after_title' 	=> '</h3>',
				)
			);
		}
	}

	add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;
