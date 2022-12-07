<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-img-txt-slide <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
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
		<?php if ( ! empty( $instance['items']['a_repeater'] ) ) : $repeater_items = $instance['items']['a_repeater']; 
			$i = 1;
		?>
			<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
			<?php
				$module_header = $repeater_item['module_header'];
				$image = wp_get_attachment_image_url($repeater_item['module_image'], 'risk-box');
				$image_alt = get_post_meta($repeater_item['module_image'], '_wp_attachment_image_alt', TRUE);

				$slider = $repeater_item['module_slider'];
			?>

			<div class="row pa-img-txt-slide__row">
				<div class="col-12">
					<div class="pa-img-txt-slide__header">
						<span class="pa-img-txt-slide__header--number"><?php if($i < 10) { echo '0' . $i; } else { echo $i; } ?></span><?php echo $module_header; ?>
					</div>
				</div>
				<div class="col-12">
					<div class="pa-img-txt-slide__item__wrap">
						<div class="pa-img-txt-slide__item__wrap__left">
							<div class="pa-img-txt-slide__item__wrap__image">
								<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid img-zoom">
							</div>
						</div>
						<div class="pa-img-txt-slide__item__wrap__right">
							<div class="pa-img-txt-slide__item__wrap__content">
								<?php foreach( $slider as $index => $slider_item ) : ?>
								<?php
									$slide_header = $slider_item['item_header'];
									$slide_text = $slider_item['item_text'];
								?>
								<div class="pa-img-txt-slide__item">
									<div class="pa-img-txt-slide__item__wrap__header">
										<?php echo $slide_header; ?>
									</div>
									<div class="pa-img-txt-slide__item__wrap__underline">
										<img src="<?php echo get_template_directory_uri(); ?>/dist/img/risk-slide-line.png" alt="line" class="img-fluid">
									</div>
									<div class="pa-img-txt-slide__item__wrap__text">
										<?php echo $slide_text; ?>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php $i++; ?>
				
			<?php endforeach; ?>
		<?php endif; ?>
		<div class="row">
			<div class="col">
				<div class="pa-img-txt-slide__btn">
					<?php
						$btn_name = $instance['button']['btn_text'];
						$btn_url = $instance['button']['btn_url'];
						$btn_target = $instance['button']['btn_target'];
					?>
					<a href="<?php echo sow_esc_url_raw( $btn_url ); ?>" target="<?php if ($btn_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php echo $btn_name; ?></span></a>
				</div>
			</div>
		</div>
	</div>
</section>
