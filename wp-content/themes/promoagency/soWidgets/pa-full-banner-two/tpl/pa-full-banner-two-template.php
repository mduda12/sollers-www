<section class="pa-full-banner-two">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="pa-full-banner-two__left">
					<div class="pa-full-banner-two__left__content">
						<div class="pa-full-banner-two__left__image">
							<?php $image = wp_get_attachment_image_url($instance['banner_settings']['banner_image'], 'full'); ?>
							<?php $image_alt = get_post_meta($instance['banner_settings']['banner_image'], '_wp_attachment_image_alt', TRUE); ?>
							<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
						</div>
						<div class="pa-full-banner-two__left__number">
							<?php echo $instance['banner_settings']['banner_number']; ?>
						</div>
						<div class="pa-full-banner-two__left__text">
							<?php echo $instance['banner_settings']['banner_text']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="pa-full-banner-two__right">
					<div class="pa-full-banner-two__right__content">
						<div class="pa-full-banner-two__right__desc">
							<?php echo $instance['banner_settings']['banner_desc']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>