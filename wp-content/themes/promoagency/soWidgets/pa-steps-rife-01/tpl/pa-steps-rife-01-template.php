<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-steps-rife-01 <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 order-2 order-lg-1">
				<div class="pa-steps-rife-01__image">
					<?php
						$image = wp_get_attachment_image_url($instance['widget_content']['image'], 'full');
						$image_alt = get_post_meta($instance['widget_content']['image'], '_wp_attachment_image_alt', TRUE);
					?>
					<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
				</div>
			</div>
			<div class="col-lg-6 order-1 order-lg-2">
				<div class="pa-steps-rife-01__top">
					<div class="row no-gutters">
						<div class="col-auto">
							<div class="pa-steps-rife-01__number">
								<?php echo $instance['widget_content']['number']; ?>
							</div>
						</div>
						<div class="col">
							<div class="pa-steps-rife-01__header pa-header__mid">
								<?php echo $instance['widget_content']['header']; ?>
							</div>
						</div>
					</div>
				</div>
				<div id="accordionPoints" class="pa-steps-rife-01__content">
					<?php if ( ! empty( $instance['widget_content']['a_repeater'] ) ) : $repeater_items = $instance['widget_content']['a_repeater']; ?>
						<?php $i=1; foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php
								$title = $repeater_item['title'];
								$content = $repeater_item['content'];
							?>
							<div class="row">
								<div class="col">
									<article data-toggle="collapse" data-target="#collapse-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $i; ?>" class="pa-steps-rife-01__point <?php if($i == '1') : echo 'open'; endif; ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/dist/img/rife-arrow-up.png" alt="<?php _e("Icon", "pa"); ?>">
										<div class="title"><?php echo $title; ?></div>
										<div id="collapse-<?php echo $i; ?>" class="content collapse <?php if($i == '1') : echo 'show'; endif; ?>" aria-labelledby="heading-<?php echo $i; ?>" data-parent="#accordionPoints"><?php echo $content; ?></div>
									</article>
								</div>
							</div>
						<?php $i++; endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
