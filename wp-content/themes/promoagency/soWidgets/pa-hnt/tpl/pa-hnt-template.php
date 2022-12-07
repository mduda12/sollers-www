<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-hnt <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<?php if($instance['header']['pa_hnt_header']) {?>
		<div class="row">
			<div class="col">
				<div class="pa-hnt__header pa-header__mid">
					<?php echo $instance['header']['pa_hnt_header']; ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if($instance['numbers']['pa_hnt_numbers']) {?>
		<div class="row">
			<div class="col">
				<div class="pa-hnt__numbers">
					<?php if ( ! empty( $instance['numbers']['pa_hnt_numbers'] ) ) : $repeater_items = $instance['numbers']['pa_hnt_numbers']; ?>
						<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
						<?php
							$number = $repeater_item['repeat_number'];
							$text = $repeater_item['repeat_text'];
						?>

						<div class="pa-hnt__numbers__item">
							<div class="pa-hnt__numbers__item__value">
								<?php echo $number; ?>
							</div>
							<div class="pa-hnt__numbers__item__text">
								<?php echo $text; ?>
							</div>
						</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if($instance['description']['pa_hnt_desc']) {?>
		<div class="row">
			<div class="col">
				<div class="pa-hnt__desc">
					<?php echo $instance['description']['pa_hnt_desc']; ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</section>
