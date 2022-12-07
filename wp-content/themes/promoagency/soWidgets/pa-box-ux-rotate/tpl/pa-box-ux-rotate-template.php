<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $layout = $instance['layout']; ?>
<section class="pa-box-ux-rotate <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-box-ux-rotate__header pa-header__mid">
					<?php echo $instance['widget_header']['header']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-box-ux-rotate__subheader">
					<?php echo $instance['widget_subheader']['subheader']; ?>
				</div>
			</div>
		</div>
		<div class="pa-box-ux-rotate__wrapper">
			<div class="row justify-content-center">
				<?php if ( ! empty( $instance['a_repeater'] ) ) : $repeater_items = $instance['a_repeater']; ?>
					<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
						<?php
							$image = wp_get_attachment_image_url($repeater_item['repeat_logo'], 'full');
							$image_alt = get_post_meta($repeater_item['repeat_logo'], '_wp_attachment_image_alt', TRUE);
							$content = $repeater_item['repeat_content'];
							$title = $repeater_item['repeat_title'];
						?>
						<div class="<?php if( $layout === 'two') { echo 'col-md-6'; } elseif($layout === 'three') { echo 'col-md-4'; }; ?>">
							<div class="pa-box-ux-rotate__box">
								<div class="pa-box-ux-rotate__front h-100">
									<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
									<div class="more"><?php _e("Read more", "pa"); ?></div>
									<span class="line-top"></span>
									<span class="line-bottom"></span>
								</div>
								<div class="pa-box-ux-rotate__back h-100">
									<div class="title"><?php echo $title; ?><span class="line"></span></div>
									<div class="content"><?php echo $content; ?></div>
									<div class="back"><?php _e("Back to front", "pa"); ?></div>
								</div>
							</div> 
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
