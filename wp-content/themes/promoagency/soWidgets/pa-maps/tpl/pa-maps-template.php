<?php 
$background = $instance['widget_settings']['widget_bg'];
$background_image = wp_get_attachment_image_url($instance['widget_settings']['widget_bg_image'], 'full');

$layout = $instance['layout'];
$activate_map_one = $instance['activate_map_one'];
$activate_map_two = $instance['activate_map_two'];
?>

<div class="pa-maps__background" <?php if( $background_image ) : ?>style="background-image:url(<?php echo $background_image; ?>)"<?php endif; ?>>
<section class="pa-maps <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<?php if($activate_map_one) { ?>
				<div class="<?php if($layout === 'two') : echo 'col-lg-6' ; endif; if($layout === 'one') : echo 'col-lg-12' ; endif; ?>">
					<div class="pa-maps__item">
						<div class="pa-maps__item__map">
							<?php $this->sub_widget('SiteOrigin_Widget_GoogleMap_Widget', $args, $instance['map_widget_one']) ?>
						</div>
						<div class="pa-maps__item__other">
							<div class="pa-maps__item__other__top">
								<?php if($instance['map_widget_one_other']['header']) { ?>
								<div class="pa-maps__item__other__header">
									<?php echo $instance['map_widget_one_other']['header']; ?>
								</div>
								<?php } ?>
								<?php if($instance['map_widget_one_other']['virtual_walk']) { ?>
								<div class="pa-maps__item__other__walk">
									<?php $url = $instance['map_widget_one_other']['virtual_walk']; ?>
									<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="_blank">
										<img src="<?php echo get_template_directory_uri(); ?>/dist/img/virtual-walk-icon.png" alt="virtual walk">
									</a>
								</div>
								<?php } ?>
							</div>
							<div class="pa-maps__item__other__bottom">
								<div class="row">
								<?php if($instance['map_widget_one_other']['left_col']) { ?>
									<div class="col mr-auto">
										<?php echo $instance['map_widget_one_other']['left_col']; ?>
									</div>
									<?php } ?>
									<?php if($instance['map_widget_one_other']['right_col']) { ?>
									<div class="col-auto">
										<?php echo $instance['map_widget_one_other']['right_col']; ?>
									</div>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if($activate_map_two) { ?>
				<div class="<?php if($layout === 'two') : echo 'col-lg-6' ; endif; if($layout === 'one') : echo 'col-lg-12' ; endif; ?>">
					<div class="pa-maps__item">
						<div class="pa-maps__item__map">
							<?php $this->sub_widget('SiteOrigin_Widget_GoogleMap_Widget', $args, $instance['map_widget_two']) ?>
						</div>
						<div class="pa-maps__item__other">
							<div class="pa-maps__item__other__top">
								<?php if($instance['map_widget_two_other']['header']) { ?>
								<div class="pa-maps__item__other__header">
									<?php echo $instance['map_widget_two_other']['header']; ?>
								</div>
								<?php } ?>
								<?php if($instance['map_widget_two_other']['virtual_walk']) { ?>
								<div class="pa-maps__item__other__walk">
									<?php $url = $instance['map_widget_two_other']['virtual_walk']; ?>
									<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="_blank">
										<img src="<?php echo get_template_directory_uri(); ?>/dist/img/virtual-walk-icon.png" alt="virtual walk">
									</a>
								</div>
								<?php } ?>
							</div>
							<div class="pa-maps__item__other__bottom">
								<div class="row">
								<?php if($instance['map_widget_two_other']['left_col']) { ?>
									<div class="col mr-auto">
										<?php echo $instance['map_widget_two_other']['left_col']; ?>
									</div>
									<?php } ?>
									<?php if($instance['map_widget_two_other']['right_col']) { ?>
									<div class="col-auto">
										<?php echo $instance['map_widget_two_other']['right_col']; ?>
									</div>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
</div>