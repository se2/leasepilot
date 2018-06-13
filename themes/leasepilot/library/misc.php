<?php
	/**
	 * Miscellaneous Functions
	 *
	 * @category   Function
	 * @package    WordPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

/**
 * Print clean current site's URL.
 */
function the_clean_url() {
	echo esc_attr( get_site_url() );
}

/**
 * Print socials sharing icons.
 *
 * @param array $services Social sharing services.
 */
function the_socials_share( $services = array( 'email', 'facebook', 'twitter', 'google-plus', 'linkedin' ) ) {

	$urls = array(
		'email'       => 'mailto:?subject=' . get_the_title() . '&amp;body=' . get_permalink(),
		'google-plus' => 'https://plus.google.com/share?url=' . get_permalink(),
		'facebook'    => 'https://www.facebook.com/sharer.php?u=' . get_permalink(),
		'twitter'     => 'https://twitter.com/intent/tweet?url=' . get_permalink(),
		'linkedin'    => 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink() . '&title=' . get_the_title(),
		'pinterest'   => 'http://pinterest.com/pin/create/link/?url=' . get_permalink(),
		'tumblr'      => 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_permalink() . '&title={title}' . get_the_title(),
	);

	$socials = '<div class="social-buttons">';

	foreach ( $services as $key => $service ) {
		if ( isset( $urls[ $service ] ) ) {
			$socials .= '<a class="social-button ' . $service . '" href="' . $urls[ $service ] . '" target="_blank"></a>';
		}
	}

	$socials .= '</div>';

	echo $socials; //phpcs:ignore

}

/**
 * Custom Color Palette
 *
 * @param mixed $init Init.
 */
function my_mce4_options( $init ) {

	$custom_colours = '
		"fc4513", "Primary Color",
		"3c4542", "Secondary Color",
		"e6e6e6", "Light Gray",
		"97daea", "Light Blue",
		"3adb76", "Success",
		"ffae00", "Warning",
		"cc4b37", "Alert",
		"ffffff", "White",
		"000000", "Black"
	';

	// build colour grid default+custom colors.
	$init['textcolor_map'] = '[' . $custom_colours . ']';

	// change the number of rows in the grid if the number of colors changes.
	// 8 swatches per row.
	$init['textcolor_rows'] = 2;

	return $init;
}

add_filter( 'tiny_mce_before_init', 'my_mce4_options' );

/**
 * Register our CTA Widget
 */
function register_posts_widget() {
	register_widget( 'PostsWidget' );
}

add_action( 'widgets_init', 'register_posts_widget' );

/**
 * Standard OpenGraph
 */
function fb_opengraph() {
	global $post;

	if ( is_single() ) {
		if ( has_post_thumbnail( $post->ID, 'fb_large' ) ) {
			$img_src = get_the_post_thumbnail_url( $post->ID, 'fb_large' );
		} elseif ( has_post_thumbnail( $post->ID, 'fb_small' ) ) {
			$img_src = get_the_post_thumbnail_url( $post->ID, 'fb_small' );
		} elseif ( has_post_thumbnail( $post->ID ) ) {
			$img_src = get_the_post_thumbnail_url( $post->ID, 'large' );
		} else {
			$img_src = get_stylesheet_directory_uri() . '/src/assets/leasepilot-fb.jpg';
		}
		// phpcs:disable
		if ( $excerpt = $post->post_excerpt ) {
				$excerpt = strip_tags( $post->post_excerpt );
				$excerpt = str_replace( "", "'", $excerpt );
		} else {
				$excerpt = get_bloginfo( 'description' );
		}
		?>

	<meta property="og:title" content="<?php echo the_title(); ?>"/>
	<meta property="og:description" content="<?php echo $excerpt; ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="<?php echo the_permalink(); ?>"/>
	<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
	<meta property="og:image" content="<?php echo $img_src; ?>"/>
<?php
	} else {
		return;
	}
	// phpcs:enable
}

add_action( 'wp_head', 'fb_opengraph', 5 );

/**
 * Blockquote source shortcode.
 * [source]Content here.[/source]
 *
 * @param mixed $atts Shortcode attributes.
 * @param mixed $content Shortcode content.
 */
function blockquote_source_shortcode_handler( $atts, $content = null ) {
	// Attributes.
	$atts = shortcode_atts( array(), $atts );
	return '<span class="ff-hn primary-color blockquote__source">' . $content . '</span>';
}
add_shortcode( 'source', 'blockquote_source_shortcode_handler' );

/**
 * Blockquote shortcode.
 * [blockquote style="start"]Content here.[/blockquote]
 *
 * @param mixed $atts Shortcode attributes.
 * @param mixed $content Shortcode content.
 */
function blockquote_shortcode_handler( $atts, $content = null ) {
	// Attributes.
	$atts = shortcode_atts(
		array(
			'float' => 'none',
			'width' => '100%',
			'class' => '',
			'style' => 'start',
		),
		$atts
	);
	$style = 'width:' . $atts['width'] . ';float:' . $atts['float'];
	$blockquote  = ( 'end' === $atts['style'] ) ? '<div class="'. $atts['class'] .' blockquote pos-rel blockquote--end" style="' . $style . '">' : '<div class="'. $atts['class'] .' blockquote pos-rel" style="' . $style . '">';
	$blockquote .= '<img src="' . get_template_directory_uri() . '/dist/assets/images/quotemark.png" alt="" class="pos-abs">';
	$blockquote .= do_shortcode( $content );
	$blockquote .= '</div>';
	return $blockquote;
}
add_shortcode( 'blockquote', 'blockquote_shortcode_handler' );

/**
 * Hooks your functions into the correct filters.
 * Credit: http://qnimate.com/adding-buttons-to-wordpress-visual-editor/
 */
function wdm_add_mce_button() {
	// Check user permissions.
	if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
		return;
	}
	// Check if WYSIWYG is enabled.
	if ( 'true' === get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'wdm_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'wdm_register_mce_button' );
	}
}
add_action( 'admin_head', 'wdm_add_mce_button' );

/**
 * Register new button in the editor.
 *
 * @param array $buttons Buttons array.
 */
function wdm_register_mce_button( $buttons ) {
	array_push( $buttons, 'wdm_mce_dropmenu' );
	return $buttons;
}

/**
 * Declare a script for the new button.
 * The script will insert the shortcode on the click event.
 *
 * @param array $plugin_array Plugin array of TinyMCE.
 */
function wdm_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['wdm_mce_dropmenu'] = get_template_directory_uri() . '/src/assets/js/lib/wdm-mce-button.js';
	return $plugin_array;
}

/**
 * Credit: https://stackoverflow.com/questions/12228644/how-to-detect-light-colors-with-php
 */
function HTMLToRGB( $htmlCode ) {
	if ( $htmlCode[0] == '#' ) {
		$htmlCode = substr($htmlCode, 1);
	}

	if ( strlen( $htmlCode ) == 3 ) {
		$htmlCode = $htmlCode[0] . $htmlCode[0] . $htmlCode[1] . $htmlCode[1] . $htmlCode[2] . $htmlCode[2];
	}

	$r = hexdec($htmlCode[0] . $htmlCode[1]);
	$g = hexdec($htmlCode[2] . $htmlCode[3]);
	$b = hexdec($htmlCode[4] . $htmlCode[5]);

	return $b + ( $g << 0x8 ) + ( $r << 0x10 );
}

/**
 * Credit: https://stackoverflow.com/questions/12228644/how-to-detect-light-colors-with-php
 */
function RGBToHSL( $RGB ) {
	$r = 0xFF & ( $RGB >> 0x10 );
	$g = 0xFF & ( $RGB >> 0x8 );
	$b = 0xFF & $RGB;

	$r = ( (float) $r ) / 255.0;
	$g = ( (float) $g ) / 255.0;
	$b = ( (float) $b ) / 255.0;

	$maxC = max( $r, $g, $b );
	$minC = min( $r, $g, $b );

	$l = ( $maxC + $minC ) / 2.0;

	if ( $maxC == $minC ) {
		$s = 0;
		$h = 0;
	} else {
		if ( $l < .5 ) {
			$s = ( $maxC - $minC ) / ( $maxC + $minC );
		} else {
			$s = ( $maxC - $minC ) / ( 2.0 - $maxC - $minC );
		}
		if ( $r == $maxC )
			$h = ( $g - $b ) / ( $maxC - $minC );
		if( $g == $maxC )
			$h = 2.0 + ( $b - $r ) / ( $maxC - $minC );
		if ( $b == $maxC )
			$h = 4.0 + ( $r - $g ) / ( $maxC - $minC );

		$h = $h / 6.0;
	}

	$h = (int) round( 255.0 * $h );
	$s = (int) round( 255.0 * $s );
	$l = (int) round( 255.0 * $l );

	return (object) Array('hue' => $h, 'saturation' => $s, 'lightness' => $l);
}