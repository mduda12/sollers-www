<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-slider-moodys <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-slider-moodys__nav">
					<span class="navigation slider-prev slider-moodys-prev"></span><span class="navigation slider-next slider-moodys-next"></span>
				</div>
				<div class="pa-slider-moodys-init">
					<?php if ( ! empty( $instance['widget_content']['a_repeater'] ) ) : $repeater_items = $instance['widget_content']['a_repeater']; ?>
						<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php
								$title = $repeater_item['title'];
								$content = $repeater_item['content'];
								$image = $repeater_item['image'];
								$image_2 = $repeater_item['image_2'];
								if($image && $image_2) :
									$counter = '2';
									$image = wp_get_attachment_image_url($repeater_item['image'], 'double-image');
									$image_alt = get_post_meta($repeater_item['image'], '_wp_attachment_image_alt', TRUE);
									$image_2 = wp_get_attachment_image_url($repeater_item['image_2'], 'double-image');
									$image_2_alt = get_post_meta($repeater_item['image_2'], '_wp_attachment_image_alt', TRUE);
								else :
									$counter = '1';
									$image = wp_get_attachment_image_url($repeater_item['image'], 'full');
									$image_alt = get_post_meta($repeater_item['image'], '_wp_attachment_image_alt', TRUE);
								endif;
							?>
							<div class="pa-slider-moodys__wrapper">
								<div class="row">
									<div class="col-lg-6">
										<div class="pa-slider-moodys__description">
											<article>
												<?php if ( ! empty( $title ) ) : ?><header class="pa-header__mid"><?php echo $title; ?></header><?php endif; ?>
												<div class="content"><?php echo $content; ?></div>
											</article>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="pa-slider-moodys__image">
											<?php if($counter === '1') : ?>
												<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
											<?php elseif($counter === '2')  : ?>
												<div class="row no-gutters">
													<div class="col-6">
														<img class="one" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
													</div>
													<div class="col-6">
														<img class="second" src="<?php echo $image_2; ?>" alt="<?php echo $image_2_alt; ?>">
													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
