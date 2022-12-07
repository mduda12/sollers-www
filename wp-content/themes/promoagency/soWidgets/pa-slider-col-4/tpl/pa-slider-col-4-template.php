<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $background_image = wp_get_attachment_image_url($instance['widget_settings']['widget_bg_image'], 'full'); ?>
<div class="pa-slider-col-4__background" <?php if( $background_image ) : ?>style="background-image:url(<?php echo $background_image; ?>)"<?php endif; ?>>
<section class="pa-slider-col-4 <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-slider-col-4__header">
					<h2 class="header pa-header__mid"><?php echo ($instance['slider_header']['slider_title']) ?></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-slider-col-4__wrapper">
					<div class="pa-slider-col-4__nav">
						<span class="navigation slider-prev col-4-prev <?php if($alternative) : echo 'violet'; endif; ?>"></span><span class="navigation slider-next col-4-next"></span>
					</div>
					<div class="pa-slider-col-4-init">
						<?php if ( ! empty( $instance['a_repeater'] ) ) : $repeater_items = $instance['a_repeater']; ?>
							<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php
								$image = wp_get_attachment_image_url($repeater_item['repeat_image'], 'slider-col-4');
								$image_alt = get_post_meta($repeater_item['repeat_image'], '_wp_attachment_image_alt', TRUE);
								$title = $repeater_item['repeat_title'];
								$intro = $repeater_item['repeat_hover_intro'];
								$url = $repeater_item['repeat_url'];
								$link_target = $repeater_item['repeat_url_target'];
							?>
								<article class="pa-slider-col-4__box">
									<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
									<div class="pa-slider-col-4__data data">
										<span class="title"><?php echo $title; ?></span>
										<?php if ( $intro ) : ?>
											<div class="pa-slider-col-4__data--hover hover">
												<span class="intro"><?php echo $intro ?></span>
											</div>
										<?php endif ?>
										<?php if ( $alternative ) : ?>
											<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-violet"><span><?php _e("Read more", "pa"); ?></span></a>
										<?php else : ?>
											<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php _e("Read more", "pa"); ?></span></a>
										<?php endif ?>
									</div>
								</article>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
