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


if ( ! class_exists( 'PostsWidget' ) ) {

	class PostsWidget extends WP_Widget {

		/**
		* Sets up the widgets name etc
		*/
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'posts_widget',
				'description' => 'Posts Widget',
			);
			parent::__construct( 'posts_widget', 'Posts Widget', $widget_ops );
		}

		/**
		* Outputs the content of the widget
		*
		* @param array $args
		* @param array $instance
		*/
		public function widget( $args, $instance ) {
			// Outputs the content of the widget.
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			// Widget ID with prefix for use in ACF API functions.
			$widget_id = 'widget_' . $args['widget_id'];
			$title     = get_field( 'title', $widget_id ) ? get_field( 'title', $widget_id ) : '';
			$posts     = get_field( 'posts', $widget_id );

			echo $args['before_widget'];

			if ( $title ) {
				echo $args['before_title'] . esc_html($title) . $args['after_title'];
			}

			if ( $posts ) {
				echo '<ul>';
				foreach ( $posts as $key => $post ) {
					$post_object = $post['post'];
					echo '<li><a href="' . get_permalink( $post_object->ID ) . '">' . $post_object->post_title . '</a></li>';
				}
				echo '</ul>';
			}

			echo $args['after_widget'];

		}

		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			// outputs the options form on admin
		}

		/**
		 * Processing widget options on save
		 *
		 * @param array $new_instance The new options
		 * @param array $old_instance The previous options
		 *
		 * @return array
		 */
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
		}

	}

}

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
		if ( has_post_thumbnail( $post->ID ) ) {
			$img_src = get_the_post_thumbnail_url( $post->ID, 'medium' );
		} else {
			$img_src = get_stylesheet_directory_uri() . '/src/assets/leasepilot-logo.jpg';
		}
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
}

add_action( 'wp_head', 'fb_opengraph', 5 );
