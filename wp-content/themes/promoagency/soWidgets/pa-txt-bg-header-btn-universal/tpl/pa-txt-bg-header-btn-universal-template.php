<?php $background = wp_get_attachment_image_url($instance['widget_content']['background'], 'full'); ?>
<section class="pa-txt-bg-header-btn-universal" style="background-image:url(<?php echo $background; ?>)">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-txt-bg-header-btn-universal__header pa-header__big">
					<?php echo $instance['widget_content']['header']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-txt-bg-header-btn-universal__content pa-subheader__mid">
					<?php echo $instance['widget_content']['content']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php								
					$url_name = $instance['widget_content']['url_name'];
					$url = $instance['widget_content']['url'];
					$link_target = $instance['widget_content']['url_target'];
					if ($url_name && $url) :
				?>
				<div class="pa-txt-bg-header-btn-universal__btn">
					<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-full-green"><span><?php echo $url_name; ?></span></a>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>