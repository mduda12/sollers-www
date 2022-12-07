<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-dna <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<?php if($instance['header']['pa_widget_header']) {?>
		<div class="row">
			<div class="col">
				<div class="pa-widget__header pa-header__mid">
					<?php echo $instance['header']['pa_widget_header']; ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if($instance['header']['pa_widget_subheader']) {?>
		<div class="row">
			<div class="col">
				<div class="pa-widget__subheader">
					<?php echo $instance['header']['pa_widget_subheader']; ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col">
				<div class="pa-dna__chart">
					<div class="pa-dna__chart__left">
						<div class="pa-dna__chart__left__top">
							<div class="pa-dna__chart__left__icon">
							<?php 
								$icon_one = wp_get_attachment_image_url($instance['icon_texts']['icon_one_image'], 'full'); 
								$icon_one_alt = get_post_meta($instance['icon_texts']['icon_one_image'], '_wp_attachment_image_alt', TRUE);
								?>
							<img src="<?php echo $icon_one; ?>" alt="<?php echo $icon_one_alt; ?>" class="img-fluid">
							</div>
							<div class="pa-dna__chart__left__header">
								<?php echo $instance['icon_texts']['icon_one_header']; ?>
							</div>
							<div class="pa-dna__chart__left__text">
								<?php echo $instance['icon_texts']['icon_one_text']; ?>
							</div>
						</div>
						<div class="pa-dna__chart__left__bottom">
							<div class="pa-dna__chart__left__icon">
							<?php 
								$icon_two = wp_get_attachment_image_url($instance['icon_texts']['icon_two_image'], 'full'); 
								$icon_two_alt = get_post_meta($instance['icon_texts']['icon_two_image'], '_wp_attachment_image_alt', TRUE);
								?>
							<img src="<?php echo $icon_two; ?>" alt="<?php echo $icon_two_alt; ?>" class="img-fluid">
							</div>
							<div class="pa-dna__chart__left__header">
								<?php echo $instance['icon_texts']['icon_two_header']; ?>
							</div>
							<div class="pa-dna__chart__left__text">
								<?php echo $instance['icon_texts']['icon_two_text']; ?>
							</div>
						</div>
					</div>
					<div class="pa-dna__chart__center">
						<div class="pa-dna__chart__center__image">
							<?php 
							$main_image = wp_get_attachment_image_url($instance['main_image']['image'], 'full'); 
							$main_image_alt = get_post_meta($instance['main_image']['image'], '_wp_attachment_image_alt', TRUE);
							?>
						<img src="<?php echo $main_image; ?>" alt="<?php echo $main_image_alt; ?>" class="img-fluid">
						</div>
					</div>
					<div class="pa-dna__chart__right">
						<div class="pa-dna__chart__right__top">
							<div class="pa-dna__chart__right__icon">
							<?php 
								$icon_three = wp_get_attachment_image_url($instance['icon_texts']['icon_three_image'], 'full'); 
								$icon_three_alt = get_post_meta($instance['icon_texts']['icon_three_image'], '_wp_attachment_image_alt', TRUE);
								?>
							<img src="<?php echo $icon_three; ?>" alt="<?php echo $icon_three_alt; ?>" class="img-fluid">
							</div>
							<div class="pa-dna__chart__right__header">
								<?php echo $instance['icon_texts']['icon_three_header']; ?>
							</div>
							<div class="pa-dna__chart__right__text">
								<?php echo $instance['icon_texts']['icon_three_text']; ?>
							</div>
						</div>
						<div class="pa-dna__chart__right__bottom">
							<div class="pa-dna__chart__right__icon">
							<?php 
								$icon_four = wp_get_attachment_image_url($instance['icon_texts']['icon_four_image'], 'full'); 
								$icon_four_alt = get_post_meta($instance['icon_texts']['icon_four_image'], '_wp_attachment_image_alt', TRUE);
								?>
							<img src="<?php echo $icon_four; ?>" alt="<?php echo $icon_four_alt; ?>" class="img-fluid">
							</div>
							<div class="pa-dna__chart__right__header">
								<?php echo $instance['icon_texts']['icon_four_header']; ?>
							</div>
							<div class="pa-dna__chart__right__text">
								<?php echo $instance['icon_texts']['icon_four_text']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
