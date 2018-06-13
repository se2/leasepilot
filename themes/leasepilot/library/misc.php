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
			'style' => 'start',
		),
		$atts
	);
	return $content;
}
add_shortcode( 'blockquote', 'blockquote_shortcode_handler' );

/**
 * Hooks your functions into the correct filters.
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
