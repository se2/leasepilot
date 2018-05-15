<?php get_header(); ?>

<div class="page-wrapper single-case-study">

	<?php get_template_part( 'template-parts/page', 'header' ); ?>

	<?php
		if ( have_rows( 'case_study_blocks' ) ) {
			$blocks = get_field( 'case_study_blocks' );
			foreach ($blocks as $key => $block) {
				switch ($block['acf_fc_layout']) {
					case 'big_heading_block':
	?>
	<!-- Big text block -->
	<div class="single-case-study__block single-case-study__block--big-text" style="background-color:<?php echo $block['block_background_color']; ?>;">
		<div class="main-container">
			<div class="grid-x">
				<div class="cell small-12 medium-9">
					<h1 class="ff-hn lighter" style="color:<?php echo $block['text_color']; ?>"><?php echo $block['big_heading']; ?></h1>
				</div>
			</div>
		</div>
	</div>
	<!-- /Big text block -->
	<?php
						break;

					case 'text_quote_block':
	?>
	<!-- Text Quote block -->
	<div class="single-case-study__block single-case-study__block--text-quote" style="background-color:<?php echo $block['block_background_color']; ?>;">
		<div class="main-container">
			<div class="grid-x grid-margin-x">
				<div class="cell medium-4">
					<h3 class="ff-cd primary-color"><?php echo $block['block_title'] ?></h3>
					<h4 class="quote secondary-color"><?php echo $block['block_quote']; ?></h4>
				</div>
				<div class="cell medium-8"><?php echo $block['block_content']; ?></div>
			</div>
		</div>
	</div>
	<!-- /Text Quote block -->
	<?php
						break;

					case 'cta_block':
	?>
	<!-- Case Study CTA -->
	<div class="single-case-study__block single-case-study__block--cta" style="background-color:<?php echo $block['block_background_color']; ?>;">
		<div class="main-container">
			<div class="grid-x grid-margin-x flex-center-items">
				<div class="cell medium-7 single-case-study__block--cta__img-wrapper">
					<img src="<?php echo $block['cta_image']; ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="cell medium-5 single-case-study__block--cta__content-wrapper">
					<h2 class="white-color">
						<?php echo $block['cta_title']; ?>
						<span class="ff-hn white-color"><?php echo $block['cta_subtitle']; ?></span>
					</h2>
					<p class="white-color"><?php echo $block['cta_description']; ?></p>
					<a href="<?php echo $block['cta_link']; ?>" class="button button__primary mb0"><?php echo $block['cta_button_title']; ?></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /Case Study CTA -->
	<?php
						break;

					default:

						break;
				}
			}
		}
	?>
</div>

<?php get_footer(); ?>
