<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-txt-img-rife <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="pa-txt-img-rife__header pa-header__mid">
					<?php echo $instance['widget_content']['header']; ?>
				</div>
				<div class="pa-txt-img-rife__intro">
					<?php echo $instance['widget_content']['intro']; ?>
				</div>
				<div class="pa-txt-img-rife__point point-1">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/img/point-1.png" alt="<?php _e("Point", "pa"); ?>"><?php echo $instance['widget_content']['point_1']; ?>
				</div>
				<div class="pa-txt-img-rife__point point-2">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/img/point-2.png" alt="<?php _e("Point", "pa"); ?>"><?php echo $instance['widget_content']['point_2']; ?>
				</div>
				<div class="pa-txt-img-rife__point point-3">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/img/point-3.png" alt="<?php _e("Point", "pa"); ?>"><?php echo $instance['widget_content']['point_3']; ?>
				</div>
				<div class="pa-txt-img-rife__point point-4">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/img/point-4.png" alt="<?php _e("Point", "pa"); ?>"><?php echo $instance['widget_content']['point_4']; ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="pa-txt-img-rife__image">
					<?php
						$image = wp_get_attachment_image_url($instance['widget_content']['image'], 'slider-cs');
						$image_alt = get_post_meta($instance['widget_content']['image'], '_wp_attachment_image_alt', TRUE);
					?>
					<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
				</div>
			</div>
		</div>
	</div>
</section>
