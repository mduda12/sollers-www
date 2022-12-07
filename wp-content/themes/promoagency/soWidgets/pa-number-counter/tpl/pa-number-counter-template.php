<div class="pa-full-width">
<div class="container">
	<div class="row">
		<div class="col">
			<div class="pa-number-counter">
				<div class="number-counter-item">
					<div class="number-counter-box">
						<div class="number-counter-box-content">
							<?php $image = wp_get_attachment_image_url($instance['counter_icon'], 'full'); ?>
							<?php $image_alt = get_post_meta($instance['counter_icon'], '_wp_attachment_image_alt', TRUE); ?>
							<?php if ( ! empty( $image ) ) { ?>
								<div class="number-counter-box-icon">
									<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
								</div>
							<?php } ?>
							<div class="number-counter-value" data-count="<?php echo ($instance['counter_number']) ?>">
								0
							</div>
						</div>
					</div>
					<div class="number-counter-text">
						<?php echo ($instance['counter_name']) ?>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>
</div>

