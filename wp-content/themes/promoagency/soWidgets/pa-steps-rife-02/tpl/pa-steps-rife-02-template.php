<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $bg_section = $instance['widget_content']['checkbox']; ?>
<section class="pa-steps-rife-02 <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="pa-steps-rife-02__top">
					<div class="row no-gutters">
						<div class="col-auto">
							<div class="pa-steps-rife-02__number">
								<?php echo $instance['widget_content']['number']; ?>
							</div>
						</div>
						<div class="col">
							<div class="pa-steps-rife-02__header pa-header__mid">
								<?php echo $instance['widget_content']['header']; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="pa-steps-rife-02__content <?php if( $bg_section ) { echo 'background'; } ?>">
					<div class="row">
						<div class="col">
							<?php echo $instance['widget_content']['content']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="pa-steps-rife-02__image">
					<?php
						$image = wp_get_attachment_image_url($instance['widget_content']['image'], 'full');
						$image_alt = get_post_meta($instance['widget_content']['image'], '_wp_attachment_image_alt', TRUE);
					?>
					<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
				</div>
			</div>
		</div>
	</div>
</section>
