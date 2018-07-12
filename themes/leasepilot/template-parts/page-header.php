<?php
	/**
	 * Page Header
	 *
	 * @category   Components
	 * @package    FoundationPress
	 * @subpackage LeasePilot
	 * @author     Delin Design <contact@delindesign.com>
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://delindesign.com
	 */

$prefix      = '';
$option      = '';
$thin_header = '';
$bg          = '';
$bg_pos      = '';
$bg_size     = '';
$page_title  = get_the_title();
$is_home     = is_front_page() || is_page_template( 'page-templates/front.php' );
$colon       = ':';

if ( isset( get_queried_object()->term_id ) ) {
	$term       = get_term( get_queried_object()->term_id );
	$option     = $term;
	$page_title = $term->name;
} elseif ( is_post_type_archive( 'resources' ) ) {
	$prefix     = 'r_';
	$option     = 'option';
	$page_title = 'Resources';
} elseif ( is_post_type_archive( 'careers' ) ) {
	$prefix     = 'c_';
	$option     = 'option';
	$page_title = 'Careers';
} elseif ( is_home() ) {
	$option      = get_option( 'page_for_posts' );
	$page_title  = 'Blog';
	$thin_header = 'page-header--bg-img--thin';
} elseif ( is_singular( 'careers' ) ) {
	$page_title  = 'Careers';
	$thin_header = 'page-header--bg-img--thin';
	$colon       = '';
} elseif ( is_singular( 'post' ) ) {
	$thin_header = 'page-header--bg-img--thin';
	$colon       = '';
}

if ( 'thin' === get_field( $prefix . 'page_heading_height', $option ) ) {
	$thin_header = 'page-header--bg-img--thin';
}

$bg_type    = get_field( $prefix . 'background', $option );
$player_url = '';

switch ( $bg_type ) {
	case 'color':
		$bg = 'background-color:' . get_field( $prefix . 'background_color', $option );
		break;
	case 'image':
		$bg = 'background-image:url(' . get_field( $prefix . 'background_image', $option ) . ')';
		break;
	case 'video':
		$thin_header .= ' page-header--video';
		$bg           = 'background-image:url(' . get_field( $prefix . 'background_video_poster', $option ) . ')';
		$video_type   = get_field( $prefix . 'background_video_type', $option ) ? get_field( $prefix . 'background_video_type', $option ) : 'upload';
		$player_url   = get_field( $prefix . 'vimeo_player_url', $option );
		break;
	default:
		break;
}

// Default bg image for single post.
if ( is_singular( 'post' ) && ! get_field( $prefix . 'background_image', $option ) ) {
	$bg = 'background-image:url(' . get_field( $prefix . 'background_image', get_option( 'page_for_posts' ) ) . ')';
}

// Background position.
if ( get_field( $prefix . 'background_position', $option ) ) {
	$bg_pos = 'bg-' . get_field( $prefix . 'background_position', $option );
}

// Background size.
if ( get_field( $prefix . 'background_position', $option ) ) {
	$bg_size = 'bg-' . get_field( $prefix . 'background_size', $option );
}

?>
<!-- Page header -->
<header class="page-header page-header--bg-img <?php echo esc_attr( $thin_header . ' ' . $bg_pos . ' ' . $bg_size ); ?> pos-rel" style="<?php echo esc_attr( $bg ); ?>;">
	<?php
	if ( 'video' === $bg_type ) :
		if ( 'vimeo' === $video_type ) :
	?>
	<div class="vimeo-wrapper show-for-large">
		<iframe src="<?php echo esc_attr( $player_url ); ?>?background=1&autoplay=1&loop=1&title=0&byline=0&muted=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
	<?php
		else :
	?>
	<video muted autoplay playsinline preload="none" class="fullscreen-bg__video show-for-large">
		<source src="<?php the_field( $prefix . 'background_video', $option ); ?>" type="video/mp4">
	</video>
	<?php
		endif;
	endif;
	?>
	<div class="main-container pos-rel">
		<div class="grid-x page-header__content <?php echo ( $is_home ) ? 'page-header__content--home' : ''; ?> <?php echo ( is_single() && ! $is_home ) ? 'page-header__content--singular' : ''; ?>">
			<div class="cell <?php echo ( ! is_singular( 'post' ) ) ? 'small-9 medium-6 large-5' : 'small-12'; ?>">
				<?php if ( is_singular( 'resources' ) && get_field( $prefix . 'case_study_logo_single', $option ) ) : ?>
				<img src="<?php the_field( $prefix . 'case_study_logo_single' ); ?>" alt="<?php the_title(); ?>" class="archive-page-logo archive-page-logo--singular">
				<?php else : ?>
				<?php if ( ! $is_home && get_field( $prefix . 'show_page_title', $option ) ) : ?>
				<h1 class="page-title" style="color:<?php the_field( $prefix . 'page_title_color', $option ); ?>"><?php echo esc_attr( $page_title . $colon ); ?></h1>
				<?php endif; ?>
				<?php endif; ?>
				<div class="page-subheading">
					<?php the_field( $prefix . 'page_subheading', $option ); ?>
					<?php if ( get_field( $prefix . 'page_cta_title', $option ) && get_field( $prefix . 'page_cta_link', $option ) ) : ?>
					<a href="<?php the_field( $prefix . 'page_cta_link', $option ); ?>" class="button button__cta"><?php the_field( $prefix . 'page_cta_title', $option ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- /Page header -->
