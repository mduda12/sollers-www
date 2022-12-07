<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $banner_bg = wp_get_attachment_image_url($instance['banner_bg_img']['bg_image'], 'full'); ?>
<section class="pa-banner-four-col" <?php if($banner_bg) { ?>style="background-image: url(<?php echo $banner_bg; ?>)"<?php } ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="pa-banner-four-col__item pa-banner-four-col__item--1">
					<div class="pa-banner-four-col__item__container">
						<div class="pa-banner-four-col__item__header">
							<?php echo $instance['col_one']['header']; ?>
						</div>
						<div class="pa-banner-four-col__item__text">
							<?php echo $instance['col_one']['text']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="pa-banner-four-col__item pa-banner-four-col__item--2">
					<div class="pa-banner-four-col__item__container">
						<div class="pa-banner-four-col__item__header">
							<?php echo $instance['col_two']['header']; ?>
						</div>
						<div class="pa-banner-four-col__item__text">
							<?php echo $instance['col_two']['text']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="pa-banner-four-col__item pa-banner-four-col__item--3">
					<div class="pa-banner-four-col__item__container">
						<div class="pa-banner-four-col__item__header">
							<?php echo $instance['col_three']['header']; ?>
						</div>
						<div class="pa-banner-four-col__item__text">
							<?php echo $instance['col_three']['text']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="pa-banner-four-col__item pa-banner-four-col__item--4">
					<div class="pa-banner-four-col__item__container">
						<div class="pa-banner-four-col__item__header">
							<?php echo $instance['col_four']['header']; ?>
						</div>
						<div class="pa-banner-four-col__item__text">
							<?php echo $instance['col_four']['text']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
