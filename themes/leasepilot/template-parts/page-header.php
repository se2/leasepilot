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

$bg_type  = get_field( 'background' );
$bg       = '';
$video_id = null;

switch ( $bg_type ) {
	case 'color':
		$bg = 'background-color:' . get_field( 'background_color' );
		break;
	case 'image':
		$bg = 'background-image:url(' . get_field( 'background_image' ) . ')';
		break;
	case 'video':
		$bg       = 'background-image:url(' . get_field( 'background_video_poster' ) . ')';
		$video_id = (int) substr( wp_parse_url( get_field( 'background_video' ), PHP_URL_PATH ), 1 );
		break;
	default:
		break;
}
?>
<!-- Page header -->
<header class="page-header page-header--bg-img pos-rel" style="<?php echo esc_attr( $bg ); ?>;">
	<?php if ( 'video' === $bg_type ) : ?>
	<video muted autoplay playsinline preload="none" class="fullscreen-bg__video" poster="<?php the_field( 'background_video_poster' ); ?>">
			<source src="<?php the_field( 'background_video' ); ?>" type="video/mp4">
	</video>
	<?php endif; ?>
	<div class="main-container pos-rel">
		<div class="grid-x page-header__content <?php echo ( is_front_page() ) ? 'page-header__content--home' : ''; ?> <?php echo ( is_single() && ! is_front_page() ) ? 'page-header__content--singular' : ''; ?>">
			<div class="cell small-12 medium-6 large-5">
				<?php if ( is_singular( 'case-study' ) && get_field( 'case_study_logo_single' ) ) : ?>
				<img src="<?php the_field( 'case_study_logo_single' ); ?>" alt="<?php the_title(); ?>" class="archive-page-logo archive-page-logo--singular">
				<?php else : ?>
				<?php if ( ! is_front_page() ) : ?>
				<h1 class="page-title" style="color:<?php the_field( 'page_title_color' ); ?>"><?php the_title(); ?>:</h1>
				<?php endif; ?>
				<?php endif; ?>
				<div class="page-subheading">
					<?php the_field( 'page_subheading' ); ?>
					<?php if ( get_field( 'page_cta_title' ) && get_field( 'page_cta_link' ) ) : ?>
					<a href="<?php the_field( 'page_cta_link' ); ?>" class="button button__cta"><?php the_field( 'page_cta_title' ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- /Page header -->
