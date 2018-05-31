<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( have_comments() ) :
	if ( ( is_page() || is_single() ) && ( ! is_home() && ! is_front_page() ) ) :
?>
	<section id="comments">
		<?php

		wp_list_comments(
			array(
				'walker'            => new Foundationpress_Comments(),
				'max_depth'         => '',
				'style'             => 'ul',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => __( 'Reply', 'leasepilot' ),
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 0,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5',
				'short_ping'        => false,
				'echo'              => true,
				'moderation'        => __( 'Your comment is awaiting moderation.', 'leasepilot' ),
			)
		);

		?>
	</section>
<?php
	endif;
endif;
?>

<?php

	/*
	Do not delete these lines.
	Prevent access to this file directly
	*/

	defined( 'ABSPATH' ) || die( __( 'Please do not load this page directly. Thanks!', 'leasepilot' ) );

	if ( post_password_required() ) { ?>
	<section id="comments">
		<div class="notice">
			<p class="bottom"><?php _e( 'This post is password protected. Enter the password to view comments.', 'leasepilot' ); ?></p>
		</div>
	</section>
	<?php
	return;
}
?>

<?php
if ( comments_open() ) :
	if ( ( is_page() || is_single() ) && ( ! is_home() && ! is_front_page() ) ) :
?>
<section id="respond" class="form-section">
	<h4>
		<?php
			comment_form_title(
				__( 'Leave a Reply', 'leasepilot' ),
				/* translators: %s: author of comment being replied to */
				__( 'Leave a Reply to %s', 'leasepilot' )
			);
		?>
	</h4>
	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
	<?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
	<p>
		<?php
			/* translators: %s: login url */
			printf(
				__( 'You must be <a href="%s">logged in</a> to post a comment.', 'leasepilot' ),
				wp_login_url( get_permalink() )
			);
		?>
	</p>
	<?php else : ?>
	<form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
		<p>
			<?php
				/* translators: %1$s: site url, %2$s: user identity  */
				printf(
					__( 'Logged in as <a href="%1$s/wp-admin/profile.php">%2$s</a>.', 'leasepilot' ),
					get_option( 'siteurl' ),
					$user_identity
				);
			?> <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php __( 'Log out of this account', 'leasepilot' ); ?>"><?php _e( 'Log out &raquo;', 'leasepilot' ); ?></a>
		</p>
		<?php else : ?>
		<p>
			<input placeholder="Name" required type="text" class="five" name="author" id="author" value="<?php echo esc_attr( $comment_author ); ?>" size="22" tabindex="1" <?php if ( $req ) { echo "aria-required='true'"; } ?>>
		</p>
		<p>
			<input placeholder="Email (will not be published)" required type="email" class="five" name="email" id="email" value="<?php echo esc_attr( $comment_author_email ); ?>" size="22" tabindex="2" <?php if ( $req ) { echo "aria-required='true'"; } ?>>
		</p>
		<p>
			<input placeholder="Website" type="url" class="five" name="url" id="url" value="<?php echo esc_attr( $comment_author_url ); ?>" size="22" tabindex="3">
		</p>
		<?php endif; ?>
		<p>
			<textarea placeholder="Comment" name="comment" id="comment" tabindex="4" rows="6"></textarea>
		</p>
		<p id="allowed_tags" class="small"><strong>XHTML:</strong>
			<?php
				_e( 'You can use these tags:', 'leasepilot' );
			?>
			<code>
				<?php echo allowed_tags(); ?>
			</code>
		</p>
		<p><input name="submit" class="button button__primary mb0" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e( 'Submit »', 'leasepilot' ); ?>"></p>
		<?php comment_id_fields(); ?>
		<?php do_action( 'comment_form', $post->ID ); ?>
	</form>
	<?php endif; // If registration required and not logged in. ?>
</section>
<?php
	endif; // If you delete this the sky will fall on your head.
	endif; // If you delete this the sky will fall on your head.
