<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-flip-cards <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
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
		<div class="row">
			<div class="col">
				<div class="pa-flip-cards__wrap">
					<div class="pa-flip-cards__item">
						<div class="pa-flip-card__front">
							<div class="pa-flip-card__front__content">
								<div class="pa-flip-card__front__open pa-flip-card__flip">
									<button>
										<img src="<?php echo get_template_directory_uri(); ?>/dist/img/revert-flip-card.png" alt="flip">
									</button>
								</div>
								<div class="pa-flip-card__front__image--wrap">
									<div class="pa-flip-card__front__image--icon">
										<?php 
										$icon = wp_get_attachment_image_url($instance['card_one']['card_one_icon'], 'flip-card-icon'); 
										$icon_alt = get_post_meta($instance['card_one']['card_one_icon'], '_wp_attachment_image_alt', TRUE);
										?>
										<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
									</div>
								</div>
								<div class="pa-flip-card__front__name">
									<?php echo $instance['card_one']['card_one_name']; ?>
								</div>
								<div class="pa-flip-card__front__subheader">
									<?php echo $instance['card_one']['card_one_subcopy']; ?>
								</div>
							</div>
						</div>
						<div class="pa-flip-card__back">
							<div class="pa-flip-card__back__content">
								<div class="pa-flip-card__back__top">
									<div class="pa-flip-card__back__name">
										<?php echo $instance['card_one']['card_one_name']; ?>
									</div>
									<div class="pa-flip-card__back__close pa-flip-card__flip">
										<button>
											<img src="<?php echo get_template_directory_uri(); ?>/dist/img/close-flip-card.png" alt="flip">
										</button>
									</div>
								</div>
								<div class="pa-flip-card__back__desc">
									<?php echo $instance['card_one']['card_one_back']; ?>
								</div>
							</div>
						</div>
					</div>
					<?php if($instance['card_two']['card_two_icon']) {?>
					<div class="pa-flip-cards__item">
						<div class="pa-flip-card__front">
							<div class="pa-flip-card__front__content">
								<div class="pa-flip-card__front__open pa-flip-card__flip">
									<button>
										<img src="<?php echo get_template_directory_uri(); ?>/dist/img/revert-flip-card.png" alt="flip">
									</button>
								</div>
								<div class="pa-flip-card__front__image--wrap">
									<div class="pa-flip-card__front__image--icon">
										<?php 
										$icon = wp_get_attachment_image_url($instance['card_two']['card_two_icon'], 'flip-card-icon'); 
										$icon_alt = get_post_meta($instance['card_two']['card_two_icon'], '_wp_attachment_image_alt', TRUE);
										?>
										<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
									</div>
								</div>
								<div class="pa-flip-card__front__name">
									<?php echo $instance['card_two']['card_two_name']; ?>
								</div>
								<div class="pa-flip-card__front__subheader">
									<?php echo $instance['card_two']['card_two_subcopy']; ?>
								</div>
							</div>
						</div>
						<div class="pa-flip-card__back">
							<div class="pa-flip-card__back__content">
								<div class="pa-flip-card__back__top">
									<div class="pa-flip-card__back__name">
										<?php echo $instance['card_two']['card_two_name']; ?>
									</div>
									<div class="pa-flip-card__back__close pa-flip-card__flip">
										<button>
											<img src="<?php echo get_template_directory_uri(); ?>/dist/img/close-flip-card.png" alt="flip">
										</button>
									</div>
								</div>
								<div class="pa-flip-card__back__desc">
									<?php echo $instance['card_two']['card_two_back']; ?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($instance['card_three']['card_three_icon']) {?>
					<div class="pa-flip-cards__item">
						<div class="pa-flip-card__front">
							<div class="pa-flip-card__front__content">
								<div class="pa-flip-card__front__open pa-flip-card__flip">
									<button>
										<img src="<?php echo get_template_directory_uri(); ?>/dist/img/revert-flip-card.png" alt="flip">
									</button>
								</div>
								<div class="pa-flip-card__front__image--wrap">
									<div class="pa-flip-card__front__image--icon">
										<?php 
										$icon = wp_get_attachment_image_url($instance['card_three']['card_three_icon'], 'flip-card-icon'); 
										$icon_alt = get_post_meta($instance['card_three']['card_three_icon'], '_wp_attachment_image_alt', TRUE);
										?>
										<img src="<?php echo $icon; ?>" alt="<?php echo $icon_alt; ?>">
									</div>
								</div>
								<div class="pa-flip-card__front__name">
									<?php echo $instance['card_three']['card_three_name']; ?>
								</div>
								<?php if($instance['card_three']['card_three_subcopy']) {?>
								<div class="pa-flip-card__front__subheader">
									<?php echo $instance['card_three']['card_three_subcopy']; ?>
								</div>
								<?php } ?>
							</div>
						</div>
						<div class="pa-flip-card__back">
							<div class="pa-flip-card__back__content">
								<div class="pa-flip-card__back__top">
									<div class="pa-flip-card__back__name">
										<?php echo $instance['card_three']['card_three_name']; ?>
									</div>
									<div class="pa-flip-card__back__close pa-flip-card__flip">
										<button>
											<img src="<?php echo get_template_directory_uri(); ?>/dist/img/close-flip-card.png" alt="flip">
										</button>
									</div>
								</div>
								<div class="pa-flip-card__back__desc">
									<?php echo $instance['card_three']['card_three_back']; ?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
