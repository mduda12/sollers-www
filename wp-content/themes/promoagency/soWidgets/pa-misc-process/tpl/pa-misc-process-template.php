<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-misc-process <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-misc-process__intro">
					<header class="pa-header__mid"><?php echo $instance['widget_content']['header']; ?></header>
					<?php echo $instance['widget_content']['content']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php
					$image = wp_get_attachment_image_url($instance['widget_content']['image'], 'full');
					$image_alt = get_post_meta($instance['widget_content']['image'], '_wp_attachment_image_alt', TRUE);
					$image_mobile = wp_get_attachment_image_url($instance['widget_content']['image_mobile'], 'full');
					$image_mobile_alt = get_post_meta($instance['widget_content']['image_mobile'], '_wp_attachment_image_alt', TRUE);
					if ($image) :
				?>
				<div class="pa-misc-process__chart">
					<img class="desktop" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					<img class="mobile" src="<?php echo $image_mobile; ?>" alt="<?php echo $image_mobile_alt; ?>">
					<span class="point-1"><?php echo $instance['widget_content']['point_1']; ?></span>
					<span class="point-2"><?php echo $instance['widget_content']['point_2']; ?></span>
					<span class="point-3"><?php echo $instance['widget_content']['point_3']; ?></span>
					<span class="point-4"><?php echo $instance['widget_content']['point_4']; ?></span>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
