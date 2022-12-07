<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-misc-project <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-misc-project__intro">
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
					if ($image) :
				?>
				<div class="pa-misc-project__chart" style="background-image:url(<?php echo $image_mobile; ?>)">
					<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					<div class="pa-misc-project__box box-1">
						<header><?php echo $instance['widget_content']['box_1_header']; ?></header>
						<?php echo $instance['widget_content']['box_1_content']; ?>
						<aside class="box-1"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/audit-dot-one.png" alt="<?php _e("icon", "pa"); ?>"></aside>
					</div>
					<div class="pa-misc-project__box box-2">
						<header><?php echo $instance['widget_content']['box_2_header']; ?></header>
						<?php echo $instance['widget_content']['box_2_content']; ?>
						<aside class="box-2"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/audit-dot-two.png" alt="<?php _e("icon", "pa"); ?>"></aside>
					</div>
					<div class="pa-misc-project__box box-3">
						<header><?php echo $instance['widget_content']['box_3_header']; ?></header>
						<?php echo $instance['widget_content']['box_3_content']; ?>
						<aside class="box-3"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/audit-dot-three.png" alt="<?php _e("icon", "pa"); ?>"></aside>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>