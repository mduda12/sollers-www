<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $background_image = wp_get_attachment_image_url($instance['widget_settings']['widget_bg_image'], 'full'); ?>

<div class="pa-slider-basic__background" <?php if( $background_image ) : ?>style="background-image:url(<?php echo $background_image; ?>)"<?php endif; ?>>
<section class="pa-slider-basic <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<?php if ( ! empty( $instance['a_repeater'] ) ) : $repeater_items = $instance['a_repeater']; ?>
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
		<div class="row row-equal">
			<div class="col">
				<div class="pa-slider-basic__wrapper">
					<div class="pa-slider-basic__nav">
						<span class="navigation slider-prev basic-prev"></span><span class="navigation slider-next basic-next"></span>
					</div>
					<div class="pa-slider-basic-init">
						<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php
								$image = wp_get_attachment_image_url($repeater_item['repeat_image'], 'insights-thumb');
								$image_alt = get_post_meta($repeater_item['repeat_image'], '_wp_attachment_image_alt', TRUE);
								$title = $repeater_item['repeat_title'];
								$url_name = $repeater_item['repeat_url_name'];
								$url = $repeater_item['repeat_url'];
								$link_target = $repeater_item['repeat_url_target'];
							?>
								<article class="pa-slider-basic__box h-100">
									<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
									<div class="pa-slider-basic__data">
										<span class="title"><?php echo $title; ?></span>
										<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php echo $url_name; ?></span></a>
									</div>
								</article>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>	
</section>
</div>
