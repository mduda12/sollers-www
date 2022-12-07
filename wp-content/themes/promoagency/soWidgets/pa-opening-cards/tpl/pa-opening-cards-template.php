<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-opening-cards <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
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
			<div class="col-lg-4">
				<div class="pa-opening-cards__item">
					<div class="pa-opening-cards__icon__wrap">
						<div class="pa-opening-cards__icon">
							<?php 
								$icon = wp_get_attachment_image_url($instance['card_one']['icon'], 'flip-card-icon'); 
								$icon_alt = get_post_meta($instance['card_one']['icon'], '_wp_attachment_image_alt', TRUE);
							?>
								<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
						</div>
						<div class="pa-opening-cards__toggle">
							<button class="pa-opening-cards__toggle__btn"></button>
						</div>
					</div>
					<div class="pa-opening-cards__hidden">
						<?php echo $instance['card_one']['hidden_content']; ?>
					</div>
					<div class="pa-opening-cards__bottom">
						<div class="pa-opening-cards__bottom__header">
							<?php echo $instance['card_one']['header']; ?>
						</div>
						<div class="pa-opening-cards__bottom__cotent">
							<?php echo $instance['card_one']['content']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa-opening-cards__item">
					<div class="pa-opening-cards__icon__wrap">
						<div class="pa-opening-cards__icon">
							<?php 
								$icon = wp_get_attachment_image_url($instance['card_two']['icon'], 'flip-card-icon'); 
								$icon_alt = get_post_meta($instance['card_two']['icon'], '_wp_attachment_image_alt', TRUE);
							?>
								<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
						</div>
						<div class="pa-opening-cards__toggle">
							<button class="pa-opening-cards__toggle__btn"></button>
						</div>
					</div>
					<div class="pa-opening-cards__hidden">
						<?php echo $instance['card_two']['hidden_content']; ?>
					</div>
					<div class="pa-opening-cards__bottom">
						<div class="pa-opening-cards__bottom__header">
							<?php echo $instance['card_two']['header']; ?>
						</div>
						<div class="pa-opening-cards__bottom__cotent">
							<?php echo $instance['card_two']['content']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa-opening-cards__item">
					<div class="pa-opening-cards__icon__wrap">
						<div class="pa-opening-cards__icon">
							<?php 
								$icon = wp_get_attachment_image_url($instance['card_three']['icon'], 'flip-card-icon'); 
								$icon_alt = get_post_meta($instance['card_three']['icon'], '_wp_attachment_image_alt', TRUE);
							?>
								<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
						</div>
						<div class="pa-opening-cards__toggle">
							<button class="pa-opening-cards__toggle__btn"></button>
						</div>
					</div>
					<div class="pa-opening-cards__hidden">
						<?php echo $instance['card_three']['hidden_content']; ?>
					</div>
					<div class="pa-opening-cards__bottom">
						<div class="pa-opening-cards__bottom__header">
							<?php echo $instance['card_three']['header']; ?>
						</div>
						<div class="pa-opening-cards__bottom__cotent">
							<?php echo $instance['card_three']['content']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
