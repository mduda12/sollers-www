<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $img_shadow = $instance['widget_content']['image_shadow']; ?>
<section class="pa-head-sub-image <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
	<?php if($instance['widget_content']['header']) {?>
		<div class="row">
			<div class="col">
				<div class="pa-widget__header pa-header__mid">
					<?php echo $instance['widget_content']['header']; ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if($instance['widget_content']['subheader']) {?>
		<div class="row">
			<div class="col">
				<div class="pa-widget__subheader">
					<?php echo $instance['widget_content']['subheader']; ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col">
				<div class="pa-head-sub-image__photo__wrap">
				<?php 
					$image = wp_get_attachment_image_url($instance['widget_content']['image'], 'full'); 
					$image_alt = get_post_meta($instance['widget_content']['image'], '_wp_attachment_image_alt', TRUE);
				?>
					<div class="pa-head-sub-image__photo__image <?php if( $img_shadow ) { echo 'pa-head-sub-image__photo__image--noshadow'; } ?>">
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
