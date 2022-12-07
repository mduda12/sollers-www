<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $bg_section = $instance['widget_content']['checkbox']; ?>
<section class="pa-steps-rife-03 <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 order-2 order-lg-1">
				<div class="pa-steps-rife-03__image">
					<?php
						$image = $instance['widget_image']['image'];
						$image_2 = $instance['widget_image']['image_2'];
						if($image && $image_2) :
							$counter = '2';
							$image = wp_get_attachment_image_url($instance['widget_image']['image'], 'double-image');
							$image_alt = get_post_meta($instance['widget_image']['image'], '_wp_attachment_image_alt', TRUE);
							$image_2 = wp_get_attachment_image_url($instance['widget_image']['image_2'], 'double-image');
							$image_2_alt = get_post_meta($instance['widget_image']['image_2'], '_wp_attachment_image_alt', TRUE);
						else :
							$counter = '1';
							$image = wp_get_attachment_image_url($instance['widget_image']['image'], 'full');
							$image_alt = get_post_meta($instance['widget_image']['image'], '_wp_attachment_image_alt', TRUE);
						endif;
					?>
					<?php if($counter === '1') : ?>
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					<?php elseif($counter === '2')  : ?>
						<div class="row no-gutters">
							<div class="col-6">
								<img class="one" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
							</div>
							<div class="col-6">
								<img class="second" src="<?php echo $image_2; ?>" alt="<?php echo $image_2_alt; ?>">
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-6 order-1 order-lg-2">
				<div class="pa-steps-rife-03__top">
					<div class="row no-gutters">
						<div class="col-auto">
							<div class="pa-steps-rife-03__number">
								<?php echo $instance['widget_content']['number']; ?>
							</div>
						</div>
						<div class="col">
							<div class="pa-steps-rife-03__header pa-header__mid">
								<?php echo $instance['widget_content']['header']; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="pa-steps-rife-03__content <?php if( $bg_section ) { echo 'background'; } ?>">
					<div class="row">
						<div class="col">
							<?php echo $instance['widget_content']['content']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
