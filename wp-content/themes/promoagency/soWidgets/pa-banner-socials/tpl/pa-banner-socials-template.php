<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-banner-socials <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
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
		<div class="row">
			<div class="col">
				<div class="pa-banner-socials__items">
				<?php if ( ! empty( $instance['socials'] ) ) : $social_items = $instance['socials']; ?>
					<?php foreach( $social_items as $index => $social_item ) : ?>
						<?php
							$icon = wp_get_attachment_image_url($social_item['icon'], full);
							$icon_alt = get_post_meta($social_item['icon'], '_wp_attachment_image_alt', TRUE);
							$icon_url = $social_item['icon_url'];
							$icon_target = $social_item['icon_target'];
						?>
							
						<div class="pa-banner-socials__item">
							<a href="<?php echo sow_esc_url_raw( $icon_url ); ?>" target="<?php if ($icon_target) echo '_blank'; else echo '_self'; ?>" class="pa-banner-socials__item__link"><img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>" class="img-fluid"></a>
						</div>

					<?php endforeach; ?>
					<?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
</section>
