<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-slider-half-left <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="order-2 order-lg-1 col-lg-6">
				<div class="pa-slider-half-left__slider pa-slider-half-left-init">
					<?php if ( ! empty( $instance['widget_content']['a_repeater'] ) ) : $repeater_items = $instance['widget_content']['a_repeater']; ?>
						<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php
								$title = $repeater_item['title'];
								$content = $repeater_item['content'];
							?>
							<article>
								<?php if ( ! empty( $title ) ) : ?><header class="pa-header__mid"><?php echo $title; ?></header><?php endif; ?>
								<div class="content"><?php echo $content; ?></div>
							</article>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="order-1 order-lg-2 col-lg-6">
				<div class="pa-slider-half-left__image">
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
