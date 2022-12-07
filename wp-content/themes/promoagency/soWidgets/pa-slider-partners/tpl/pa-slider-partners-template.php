<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-slider-partners <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<?php $layout = $instance['widget_content']['layout']; ?>
		<?php if ( ! empty( $instance['widget_title']['header'] ) ) : ?>
		<div class="row">
			<div class="col">
				<div class="pa-slider-partners__header">
					<h2 class="header pa-header__mid"><?php echo $instance['widget_title']['header']; ?></h2>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col">
				<?php if ( ! empty( $instance['widget_content']['a_repeater'] ) ) : $repeater_items = $instance['widget_content']['a_repeater']; ?>
				<div class="pa-slider-partners__nav">
					<ul>
						<li class="slider-partners-prev"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/chart-slider-prev-arrow-hov.png" /></li>
						<li class="slider-partners-next"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/chart-slider-next-arrow-hov.png" /></li>
					</ul>
				</div>
				<div class="pa-slider-partners-init">
					<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
						<?php
							$image = wp_get_attachment_image_url( $repeater_item['box_image'], 'full');
							$image_alt = get_post_meta($repeater_item['box_image'], '_wp_attachment_image_alt', TRUE);
							$content = $repeater_item['box'];
							$url = $repeater_item['url'];
							$link_target = $repeater_item['url_target'];
						?>
						<div class="pa-slider-partners__box h-100">
							<?php if ( $url ) : ?>
								<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>">
							<?php endif ?>	
							<article class="h-100">
								<div class="icon"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></div>
								<span class="content"><?php echo $content; ?></span>
							</article>
							<?php if ( $url ) : ?>
								</a>
							<?php endif ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
