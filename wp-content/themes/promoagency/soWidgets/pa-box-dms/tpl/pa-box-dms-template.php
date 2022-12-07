<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $layout = $instance['mod_layout']; if($layout === 'two') : $imageSize = 'box-dms'; elseif($layout === 'four') : $imageSize = 'box-dms-four'; else : $imageSize = 'slider-technology-market'; endif ?>
<section class="pa-box-dms <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
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
			<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
				<?php
					$image = wp_get_attachment_image_url($repeater_item['repeat_image'], $imageSize);
					$image_alt = get_post_meta($repeater_item['repeat_image'], '_wp_attachment_image_alt', TRUE);
					$title = $repeater_item['repeat_title'];
					$url = $repeater_item['repeat_url'];
					$link_target = $repeater_item['repeat_url_target'];
				?>
					<div class="<?php if( $layout === 'two') { echo 'col-md-6'; } elseif($layout === 'four') { echo 'col-lg-3 col-md-6'; } else { echo 'col-md-4'; } ?>">
						<article class="pa-box-dms__box h-100">
							<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
							<div class="pa-box-dms__data">
								<span class="title"><?php echo $title; ?></span>
								<?php if ( $alternative ) : ?>
									<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-violet"><span><?php _e("Read more", "pa"); ?></span></a>
								<?php else : ?>
									<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php _e("Read more", "pa"); ?></span></a>
								<?php endif ?>
							</div>
						</article>
					</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>	
</section>
