<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-slider-core <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-slider-core__header pa-header__mid">
					<?php echo $instance['header']['pa_slider_core_header']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-slider-core__wrap">
				<?php if ( ! empty( $instance['slider']['pa_slider_core_slides'] ) ) : $repeater_items = $instance['slider']['pa_slider_core_slides']; ?>
					<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
					<?php
						$image = wp_get_attachment_image_url($repeater_item['repeat_image'], 'core-slider'); 
						$image_alt = get_post_meta($repeater_item['repeat_image'], '_wp_attachment_image_alt', TRUE); 
						$text = $repeater_item['repeat_text'];
					?>
						<div class="pa-slider-core__item">
							<div class="pa-slider-core__item__image">
								<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
							</div>
							<div class="pa-slider-core__item__text">
								<?php echo $text; ?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-slider-core__numbers">
					<?php if ( ! empty( $instance['numbers']['pa_slider_core_numbers'] ) ) : $repeater_items = $instance['numbers']['pa_slider_core_numbers']; ?>
						<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
						<?php
							$number = $repeater_item['repeat_number'];
							$text = $repeater_item['repeat_text'];
						?>

						<div class="pa-slider-core__numbers__item">
							<div class="pa-slider-core__numbers__item__value">
								<?php echo $number; ?>
							</div>
							<div class="pa-slider-core__numbers__item__text">
								<?php echo $text; ?>
							</div>
						</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
