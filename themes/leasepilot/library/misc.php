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
