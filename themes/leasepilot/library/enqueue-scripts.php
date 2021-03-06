<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

// Check to see if rev-manifest exists for CSS and JS static asset revisioning
// https://github.com/sindresorhus/gulp-rev/blob/master/integration.md .
if ( ! function_exists( 'foundationpress_asset_path' ) ) :
	function foundationpress_asset_path( $filename ) { // phpcs:ignore
		$filename_split = explode( '.', $filename );
		$dir            = end( $filename_split );
		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/rev-manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}
		return $filename;
	}
endif;


if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() { // phpcs:ignore

		// https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css
		wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', array(), '3.5.2', 'all' );

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/dist/assets/css/' . foundationpress_asset_path( 'app.css' ), array(), '2.10.10', 'all' );

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );

		// Deregister the jquery-migrate version bundled with WordPress.
		wp_deregister_script( 'jquery-migrate' );

		// CDN hosted jQuery migrate for compatibility with jQuery 3.x.
		wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array( 'jquery' ), '3.0.1', false );

		// Local lottie-web
		wp_enqueue_script( 'lottie-web', get_template_directory_uri() . '/src/assets/js/lib/lottie-web/build/player/lottie.js', array(), '5.1.18', true );

		// Local YT Background Library
		wp_enqueue_script( 'jquery-youtube-bg', get_template_directory_uri() . '/src/assets/js/lib/jquery-youtube-background/jquery.youtubebackground.js', array('jquery'), '5.1.18', true );

		// Enqueue jQuery migrate. Uncomment the line below to enable.
		// phpcs:ignore
		// wp_enqueue_script( 'jquery-migrate' );

		// Enqueue Foundation scripts.
		wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/dist/assets/js/' . foundationpress_asset_path( 'app.js' ), array( 'jquery' ), '2.10.5', true );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you need FontAwesome.
		// phpcs:ignore
		// wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true );

		// Add the comment-reply library on pages where it is necessary.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;
