<?php
	/**
	 * Miscellaneous Functions
	 *
	 * @category   Function
	 * @package    WordPress
	 * @subpackage PhaseGenomics
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
