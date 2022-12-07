<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-timeline <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<?php if($instance['header']['pa_widget_header']) {?>
		<div class="row">
			<div class="col">
				<div class="pa-widget__header pa-header__mid">
					<?php echo $instance['header']['pa_widget_header']; ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if($instance['header']['pa_widget_subheader']) {?>
		<div class="row">
			<div class="col">
				<div class="pa-widget__subheader">
					<?php echo $instance['header']['pa_widget_subheader']; ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="pa-timeline__wrap">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="pa-timeline__graph">
						<?php if ( ! empty( $instance['timeline'] ) ) : $timeline_items = $instance['timeline'];
							$i = 1;
						?>
						<?php foreach( $timeline_items as $index => $timeline_item ) : ?>
							<?php
								$icon = wp_get_attachment_image_url($timeline_item['icon'], 'timeline-icon');
								$icon_alt = get_post_meta($timeline_item['icon'], '_wp_attachment_image_alt', TRUE);
								$year = $timeline_item['year'];
								$header = $timeline_item['header'];
								$desc = $timeline_item['desc'];
							?>
							<?php if($i%2 === 1) { ?>
								<div class="pa-timeline__graph__item pa-timeline__graph__item--odd">
									<div class="pa-timeline__graph__item__top pa-timeline__graph__item__top--empty">
										&nbsp;
									</div>
									<div class="pa-timeline__graph__item__center">
										<div class="pa-timeline__graph__item__center__icon">
											<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
										</div>
									</div>
									<div class="pa-timeline__graph__item__bottom">
										<div class="pa-timeline__graph__item__date">
											<?php echo $year; ?>
										</div>
										<div class="pa-timeline__graph__item__header">
											<?php echo $header; ?>
										</div>
										<div class="pa-timeline__graph__item__desc">
											<?php echo $desc; ?>
										</div>
									</div>
								</div>
							<?php } else { ?>
								<div class="pa-timeline__graph__item pa-timeline__graph__item--even">
									<div class="pa-timeline__graph__item__top pa-timeline__graph__item__top">
										<div class="pa-timeline__graph__item__date">
											<?php echo $year; ?>
										</div>
										<div class="pa-timeline__graph__item__header">
											<?php echo $header; ?>
										</div>
										<div class="pa-timeline__graph__item__desc">
											<?php echo $desc; ?>
										</div>
									</div>
									<div class="pa-timeline__graph__item__center">
										<div class="pa-timeline__graph__item__center__icon">
											<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
										</div>
									</div>
									<div class="pa-timeline__graph__item__bottom  pa-timeline__graph__item__bottom--empty">
										&nbsp;
									</div>
								</div>
							<?php } ?>	

							<?php $i++; ?>
						<?php endforeach; ?>
						<?php endif; ?>	

					</div>
					<div class="timeline-nav-wrap"></div>
				</div>
			</div>
		</div>
	</div>
</section>
