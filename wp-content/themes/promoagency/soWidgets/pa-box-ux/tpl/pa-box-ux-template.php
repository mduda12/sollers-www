<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-box-ux <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-box-ux__header pa-header__mid">
					<?php echo $instance['widget_header']['title']; ?>
				</div> 
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-box-ux__subheader">
					<?php echo $instance['widget_header']['subheader']; ?>
				</div> 
			</div>
		</div>
		<div class="row">
			<?php if ( ! empty( $instance['a_repeater'] ) ) : $repeater_items = $instance['a_repeater']; ?>
				<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
					<?php
						$image = wp_get_attachment_image_url($repeater_item['repeat_image'], 'full');
						$image_alt = get_post_meta($repeater_item['repeat_image'], '_wp_attachment_image_alt', TRUE);
						$imageHover = wp_get_attachment_image_url($repeater_item['repeat_image_reverse'], 'full');
						$imageHover_alt = get_post_meta($repeater_item['repeat_image_reverse'], '_wp_attachment_image_alt', TRUE);
						$content = $repeater_item['repeat_content'];
						$title = $repeater_item['repeat_title'];
					?>
					<div class="col-lg-6">
						<div class="pa-box-ux__box">
							<div class="row no-gutters">
								<div class="col-4">
									<div class="pa-box-ux__image h-100">
										<img class="normal" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
										<img class="hover" src="<?php echo $imageHover; ?>" alt="<?php echo $imageHover_alt; ?>">
									</div>
								</div>
								<div class="col-8">
									<div class="pa-box-ux__content h-100">
										<div class="title">
											<?php echo $title; ?>
											<span class="line"></span>
										</div>
										<div class="content">
											<?php echo $content; ?>
										</div>
									</div>
								</div>
							</div>
						</div> 
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
