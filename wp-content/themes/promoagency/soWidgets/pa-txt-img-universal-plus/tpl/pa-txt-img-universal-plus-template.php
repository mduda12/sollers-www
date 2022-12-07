<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $bg_section = $instance['widget_content']['checkbox']; ?>
<?php $li_underline = $instance['widget_content']['li_underline']; ?>
<section class="pa-txt-img-universal <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<?php foreach( $instance['ordering'] as $item ) { switch( $item ) { case 'left' : ?>
			<div class="col-lg-6 <?php if ($right === 'on') : echo 'order-1 order-lg-2'; endif; ?>">
				<div class="pa-txt-img-universal__wrapper h-100 <?php if( $bg_section ) { echo 'background'; } ?>">
					<div class="pa-txt-img-universal__header pa-header__mid">
						<div class="row">
							<div class="col">
								<?php echo $instance['widget_content']['header']; ?>
							</div>
						</div>
					</div>
					<div class="pa-txt-img-universal__content <?php if( $li_underline ) { echo 'li_nounderline'; } ?>">
						<div class="row">
							<div class="col">
								<?php echo $instance['widget_content']['content']; ?>
							</div>
						</div>
						<?php 
							$left_header = $instance['additional_columns']['left_header'];
							$left_text = $instance['additional_columns']['left_text'];
							$right_header = $instance['additional_columns']['right_header'];
							$right_text = $instance['additional_columns']['right_text'];
						
						if($left_header || $left_text || $right_header || $right_text) { ?>
							<div class="row pa-txt-img-universal__additional__row">
								<div class="col-lg-6">
									<div class="pa-txt-img-universal__additional__left">
										<?php if($left_header) { ?>
											<div class="pa-txt-img-universal__additional__left--header">
												<?php echo $left_header; ?>
											</div>
										<?php } ?>
										<?php if($left_text) { ?>
											<div class="pa-txt-img-universal__additional__left--text">
												<?php echo $left_text; ?>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="pa-txt-img-universal__additional__right">
										<?php if($right_header) { ?>
											<div class="pa-txt-img-universal__additional__left--header">
												<?php echo $right_header; ?>
											</div>
										<?php } ?>
										<?php if($right_text) { ?>
											<div class="pa-txt-img-universal__additional__left--text">
												<?php echo $right_text; ?>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<?php								
						$url_name = $instance['widget_content']['url_name'];
						$url = $instance['widget_content']['url'];
						$link_target = $instance['widget_content']['url_target'];
						if ($url_name && $url) :
					?>
					<div class="pa-txt-img-universal__button">
						<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php echo $url_name; ?></span></a>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php break; case 'right' : $right = 'on' ;?>
			<div class="col-lg-6 <?php if ($right === 'on') : echo 'order-2 order-lg-1'; endif; ?>">
				<div class="pa-txt-img-universal__image">
					<?php
						$image = wp_get_attachment_image_url($instance['widget_content']['image'], 'slider-cs');
						$image_alt = get_post_meta($instance['widget_content']['image'], '_wp_attachment_image_alt', TRUE);
					?>
					<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
				</div>
			</div>
			<?php break; } } ?>
		</div>
	</div>
</section>
