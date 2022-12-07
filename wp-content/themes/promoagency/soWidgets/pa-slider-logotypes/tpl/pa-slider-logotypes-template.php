<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-slider-logotypes <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-slider-logotypes__header pa-header__mid">
					<?php echo $instance['widhet_header']; ?>
				</div>
			</div>
		</div>
		<div class="row">
            <div class="col">
                <div class="pa-slider-logotypes__wrapper">
					<div class="pa-slider-logotypes__nav">
						<ul>
							<li class="slider-logotypes-prev"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/chart-slider-prev-arrow-hov.png" /></li>
							<li class="slider-logotypes-next"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/chart-slider-next-arrow-hov.png" /></li>
						</ul>
					</div>
                    <div class="pa-slider-logotypes-init">
						<?php if ( ! empty( $instance['a_repeater'] ) ) : $repeater_items = $instance['a_repeater']; ?>
							<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
								<?php
								$image = wp_get_attachment_image_url($repeater_item['image'], 'full');
								$image_alt = get_post_meta($repeater_item['image'], '_wp_attachment_image_alt', TRUE);
							?>
                            <aside class="pa-slider-logotypes__box">
								<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
                            </aside>
							<?php endforeach; ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>