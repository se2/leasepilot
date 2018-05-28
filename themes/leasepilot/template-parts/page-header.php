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

$prefix     = '';
$option     = '';
$page_title = get_the_title();
if ( isset( get_queried_object()->term_id ) ) {
	$term       = get_term( get_queried_object()->term_id );
	$option     = $term;
	$page_title = $term->name;
} elseif ( is_archive( 'resources' ) ) {
	$prefix     = 'r_';
	$option     = 'option';
	$page_title = 'Resources';
}
$bg_type  = get_field( $prefix . 'background', $option );
$bg       = '';
$video_id = null;

switch ( $bg_type ) {
	case 'color':
		$bg = 'background-color:' . get_field( $prefix . 'background_color', $option );
		break;
	case 'image':
		$bg = 'background-image:url(' . get_field( $prefix . 'background_image', $option ) . ')';
		break;
	case 'video':
		$bg       = 'background-image:url(' . get_field( $prefix . 'background_video_poster', $option ) . ')';
		$video_id = (int) substr( wp_parse_url( get_field( $prefix . 'background_video', $option ), PHP_URL_PATH ), 1 );
		break;
	default:
		break;
}
?>
<!-- Page header -->
<header class="page-header page-header--bg-img pos-rel" style="<?php echo esc_attr( $bg ); ?>;">
	<?php if ( 'video' === $bg_type ) : ?>
	<video muted autoplay playsinline preload="none" class="fullscreen-bg__video" poster="<?php the_field( $prefix . 'background_video_poster', $option ); ?>">
		<source src="<?php the_field( $prefix . 'background_video', $option ); ?>" type="video/mp4">
	</video>
	<?php endif; ?>
	<div class="main-container pos-rel">
		<div class="grid-x page-header__content <?php echo ( is_front_page() ) ? 'page-header__content--home' : ''; ?> <?php echo ( is_single() && ! is_front_page() ) ? 'page-header__content--singular' : ''; ?>">
			<div class="cell small-9 medium-6 large-5">
				<?php if ( is_singular( 'resources' ) && get_field( $prefix . 'case_study_logo_single', $option ) ) : ?>
				<img src="<?php the_field( $prefix . 'case_study_logo_single' ); ?>" alt="<?php the_title(); ?>" class="archive-page-logo archive-page-logo--singular">
				<?php else : ?>
				<?php if ( ! is_front_page() ) : ?>
				<h1 class="page-title" style="color:<?php the_field( $prefix . 'page_title_color', $option ); ?>"><?php echo esc_attr( $page_title ); ?>:</h1>
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
