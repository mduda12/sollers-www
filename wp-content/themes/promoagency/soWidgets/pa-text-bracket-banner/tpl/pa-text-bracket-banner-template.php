<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $banner_bg = wp_get_attachment_image_url($instance['banner_bg_img']['bg_image'], 'full'); ?>
<section class="pa-text-bracket-banner" <?php if($banner_bg) { ?>style="background-image: url(<?php echo $banner_bg; ?>)"<?php } ?>>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-text-bracket-banner__content">
					<div class="pa-text-bracket-banner__bracket--left">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/img/widget-left-bracket.png" alt="bracket" class="img-fluid" >
					</div>
					<?php if($instance['banner_content']['header']) { ?>
					<div class="pa-text-bracket-banner__header pa-header__mid">
						<?php echo $instance['banner_content']['header']; ?>
					</div>
					<?php } ?>
					<?php if($instance['banner_content']['subheader']) { ?>
					<div class="pa-text-bracket-banner__subheader">
						<?php echo $instance['banner_content']['subheader']; ?>
					</div>
					<?php } ?>
					<div class="pa-text-bracket-banner__bracket--right">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/img/widget-right-bracket.png" alt="bracket" class="img-fluid" >
					</div>			
				</div>
			</div>
		</div>
		<?php 
			$btn_link = $instance['banner_content']['link_url']; 
			$btn_name = $instance['banner_content']['link_name'];
		?>
		<?php if($btn_name) { ?>
		<div class="row">
			<div class="col">
				<div class="pa-text-bracket-banner__cta">
					<div class="pa-chart-slider-five__slider__cta">
						<a href="<?php echo sow_esc_url_raw( $btn_link ); ?>" class="btn btn-full-green"><span><?php echo $btn_name; ?></span></a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</section>
