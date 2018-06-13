<?php
/**
 * Class PostWidget
 *
 * @category   Class
 * @package    WordPress
 * @subpackage LeasePilot
 * @author     Delin Design <contact@delindesign.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://delindesign.com
 */

if ( ! class_exists( 'PostsWidget' ) ) {
	/**
	 * New class for new widget.
	 */
	class PostsWidget extends WP_Widget {

		/**
		 * Sets up the widgets name etc.
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
		 * @param array $args arguments.
		 * @param array $instance instance.
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
			// phpcs:disable
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
			// phpcs:enable
		}

		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options.
		 */
		public function form( $instance ) {
			// Outputs the options form on admin.
		}

		/**
		 * Processing widget options on save
		 *
		 * @param array $new_instance The new options.
		 * @param array $old_instance The previous options.
		 *
		 * @return array
		 */
		public function update( $new_instance, $old_instance ) {
			// Processes widget options to be saved.
			return array();
		}

	}

}
