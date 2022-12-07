<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa_culture_process_cols <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
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
		<div class="row pa_culture_process_cols__row__desktop">
			<div class="col">
				<div class="pa_culture_process_cols__image--desktop">
					<?php 
						$image = wp_get_attachment_image_url($instance['img_desktop']['image'], 'full'); 
						$image_alt = get_post_meta($instance['img_desktop']['image'], '_wp_attachment_image_alt', TRUE);
					?>
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="pa_culture_process_cols__item">
					<div class="pa_culture_process_cols__item__icon">
						<?php 
							$icon = wp_get_attachment_image_url($instance['col_one']['icon'], 'full'); 
							$icon_alt = get_post_meta($instance['col_one']['icon'], '_wp_attachment_image_alt', TRUE);
						?>
						<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
					</div>
					<div class="pa_culture_process_cols__item__header">
						<?php echo $instance['col_one']['header']; ?>
					</div>
					<div class="pa_culture_process_cols__item__text">
						<?php echo $instance['col_one']['text']; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa_culture_process_cols__item">
					<div class="pa_culture_process_cols__item__icon">
						<?php 
							$icon = wp_get_attachment_image_url($instance['col_two']['icon'], 'full'); 
							$icon_alt = get_post_meta($instance['col_two']['icon'], '_wp_attachment_image_alt', TRUE);
						?>
						<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
					</div>
					<div class="pa_culture_process_cols__item__header">
						<?php echo $instance['col_two']['header']; ?>
					</div>
					<div class="pa_culture_process_cols__item__text">
						<?php echo $instance['col_two']['text']; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa_culture_process_cols__item">
					<div class="pa_culture_process_cols__item__icon">
						<?php 
							$icon = wp_get_attachment_image_url($instance['col_three']['icon'], 'full'); 
							$icon_alt = get_post_meta($instance['col_three']['icon'], '_wp_attachment_image_alt', TRUE);
						?>
						<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
					</div>
					<div class="pa_culture_process_cols__item__header">
						<?php echo $instance['col_three']['header']; ?>
					</div>
					<div class="pa_culture_process_cols__item__text">
						<?php echo $instance['col_three']['text']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
