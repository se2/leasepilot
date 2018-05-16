<?php
		if ( have_rows( 'case_study_blocks' ) ) {
			$blocks = get_field( 'case_study_blocks' );
			foreach ($blocks as $key => $block) {
				switch ($block['acf_fc_layout']) {
					case 'big_heading_block':
	?>
	<!-- Big text block -->
	<div class="page__block page__block--big-text" style="background-color:<?php echo $block['block_background_color']; ?>;">
		<div class="main-container">
			<div class="grid-x">
				<div class="cell small-12 medium-9">
					<h1 class="ff-hn lighter" style="<?php echo 'color:' . $block['text_color']; ?>"><?php echo $block['big_heading']; ?></h1>
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
	<div class="page__block page__block--text-quote" style="background-color:<?php echo $block['block_background_color']; ?>;">
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
	<div class="page__block page__block--cta <?php echo ( $block['image_vertical_align'] == 'bottom' ) ? 'page__block--cta--img-bottom' : ''; ?>" style="background-color:<?php echo $block['block_background_color']; ?>;">
		<div class="main-container">
			<div class="grid-x grid-margin-x flex-center-items">
				<div class="cell medium-7 <?php echo ( $block['image_vertical_align'] == 'bottom' ) ? 'large-8' : 'large-7'; ?> page__block--cta__img-wrapper">
					<img src="<?php echo $block['cta_image']; ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="cell medium-5 <?php echo ( $block['image_vertical_align'] == 'bottom' ) ? 'large-4' : 'large-5'; ?> page__block--cta__content-wrapper">
					<h2 style="<?php echo 'color:' . $block['text_color']; ?>">
						<?php echo $block['cta_title']; ?>
						<span class="lighter ff-hn"><?php echo $block['cta_subtitle']; ?></span>
					</h2>
					<p style="<?php echo 'color:' . $block['text_color']; ?>"><?php echo $block['cta_description']; ?></p>
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