<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $background_image = wp_get_attachment_image_url($instance['widget_settings']['widget_bg_image'], 'full'); ?>

<div class="pa-misc-rdlab__background" <?php if( $background_image ) : ?>style="background-image:url(<?php echo $background_image; ?>)"<?php endif; ?>>
<section class="pa-misc-rdlab <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-misc-rdlab__header pa-header__mid">
					<?php echo $instance['widget_content']['header']; ?>
				</div>
			</div>
		</div>
		<?php if ( ! empty( $instance['widget_content']['a_repeater'] ) ) : $repeater_items = $instance['widget_content']['a_repeater']; ?>
		<div class="row">
			<div class="col">
				<div class="pa-misc-rdlab__nav">
					<ul>
						<li class="slider-rdlab-prev"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/chart-slider-prev-arrow-hov.png" /></li>
						<li class="slider-rdlab-next"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/chart-slider-next-arrow-hov.png" /></li>
					</ul>
				</div>
				<div class="pa-misc-rdlab-init">
					<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php
								$image = wp_get_attachment_image_url($repeater_item['image'], 'full');
								$image_alt = get_post_meta($repeater_item['image'], '_wp_attachment_image_alt', TRUE);
								$header = $repeater_item['title'];
								$content = $repeater_item['content'];
							?>
							<section class="pa-misc-rdlab__wrapper">
								<?php								
									$url = $repeater_item['url'];
									$link_target = $repeater_item['url_target'];
									if ($url) :
								?>
								<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>">
								<?php endif; ?>
								<div class="pa-misc-rdlab__logo">
									<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
								</div>
								<div class="pa-misc-rdlab__title">
									<?php echo $header; ?>
								</div>
								<?php if ($url) : ?>
								</a>	
								<?php endif; ?>
								<div class="pa-misc-rdlab__content">
									<?php echo $content; ?>
								</div>
							</section>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
</div>
