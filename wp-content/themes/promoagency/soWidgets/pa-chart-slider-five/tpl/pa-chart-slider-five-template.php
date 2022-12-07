<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-chart-slider-five <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
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
		<div class="row pa-chart-slider-five__row">
			<div class="col-lg-3 order-lg-3 align-self-center pa-chart-slider-five__desc__wrap">
				<div class="pa-chart-slider-five__desc">
					<div class="pa-chart-slider-five__desc--image">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/img/chart-slider-five-bracket.png" alt="bracket" class="img-fluid">
					</div>
					<div class="pa-chart-slider-five__desc--header">
						<?php echo $instance['bracket_header']['header']; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 order-lg-2 align-self-center pa-chart-slider-five__column">
				<div class="pa-chart-slider-five__image__wrap">
					<div class="pa-chart-slider-five__image">
						<div class="pa-chart-slider-five__image__header">
							<?php echo $instance['chart_header']['header']; ?>
						</div>
						<?php 
							$image = wp_get_attachment_image_url($instance['chart_column']['chart_image'], 'full'); 
							$image_alt = get_post_meta($instance['chart_column']['chart_image'], '_wp_attachment_image_alt', TRUE);
						?>
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">
						<div class="pa-chart-slider-five__image__point pa-chart-slider-five__image__point--one">
							<button class="pa-chart-slider-five__button active" data-number="0"></button>
						</div>
						<div class="pa-chart-slider-five__image__point pa-chart-slider-five__image__point--two">
							<button class="pa-chart-slider-five__button" data-number="1"></button>
						</div>
						<div class="pa-chart-slider-five__image__point pa-chart-slider-five__image__point--three">
							<button class="pa-chart-slider-five__button" data-number="2"></button>
						</div>
						<div class="pa-chart-slider-five__image__point pa-chart-slider-five__image__point--four">
							<button class="pa-chart-slider-five__button" data-number="3"></button>
						</div>
						<div class="pa-chart-slider-five__image__point pa-chart-slider-five__image__point--five">
							<button class="pa-chart-slider-five__button" data-number="4"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 order-lg-1 align-self-center pa-chart-slider-five__column">
				<div class="pa-chart-slider-five__slider__wrap">
					<div class="pa-chart-slider-five__slider">
						<div class="pa-chart-slider-five__slider__item">
							<div class="pa-chart-slider-five__slider__header">
								<?php echo $instance['slide_one']['header']; ?>
							</div>
							<div class="pa-chart-slider-five__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-five__slider__content">
								<?php echo $instance['slide_one']['content']; ?>
							</div>
							<?php 
								$btn_link = $instance['slide_one']['link_url']; 
								$btn_name = $instance['slide_one']['link_name'];
							?>
							<?php if($btn_name) { ?>
							<div class="pa-chart-slider-five__slider__cta">
								<a href="<?php echo sow_esc_url_raw( $btn_link ); ?>" class="btn btn-default"><span><?php echo $btn_name; ?></span></a>
							</div>
							<?php } ?>
							<div class="pa-chart-slider-five__slider__rectangle pa-chart-slider-five__slider__rectangle--one"></div>
						</div>

						<div class="pa-chart-slider-five__slider__item">
							<div class="pa-chart-slider-five__slider__header">
								<?php echo $instance['slide_two']['header']; ?>
							</div>
							<div class="pa-chart-slider-five__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-five__slider__content">
								<?php echo $instance['slide_two']['content']; ?>
							</div>
							<?php 
								$btn_link = $instance['slide_two']['link_url']; 
								$btn_name = $instance['slide_two']['link_name'];
							?>
							<?php if($btn_name) { ?>
							<div class="pa-chart-slider-five__slider__cta">
								<a href="<?php echo sow_esc_url_raw( $btn_link ); ?>" class="btn btn-default"><span><?php echo $btn_name; ?></span></a>
							</div>
							<?php } ?>
							<div class="pa-chart-slider-five__slider__rectangle pa-chart-slider-five__slider__rectangle--two"></div>
						</div>

						<div class="pa-chart-slider-five__slider__item">
							<div class="pa-chart-slider-five__slider__header">
								<?php echo $instance['slide_three']['header']; ?>
							</div>
							<div class="pa-chart-slider-five__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-five__slider__content">
								<?php echo $instance['slide_three']['content']; ?>
							</div>
							<?php 
								$btn_link = $instance['slide_three']['link_url']; 
								$btn_name = $instance['slide_three']['link_name'];
							?>
							<?php if($btn_name) { ?>
							<div class="pa-chart-slider-five__slider__cta">
								<a href="<?php echo sow_esc_url_raw( $btn_link ); ?>" class="btn btn-default"><span><?php echo $btn_name; ?></span></a>
							</div>
							<?php } ?>
							<div class="pa-chart-slider-five__slider__rectangle pa-chart-slider-five__slider__rectangle--three"></div>
						</div>

						<div class="pa-chart-slider-five__slider__item">
							<div class="pa-chart-slider-five__slider__header">
								<?php echo $instance['slide_four']['header']; ?>
							</div>
							<div class="pa-chart-slider-five__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-five__slider__content">
								<?php echo $instance['slide_four']['content']; ?>
							</div>
							<?php 
								$btn_link = $instance['slide_four']['link_url']; 
								$btn_name = $instance['slide_four']['link_name'];
							?>
							<?php if($btn_name) { ?>
							<div class="pa-chart-slider-five__slider__cta">
								<a href="<?php echo sow_esc_url_raw( $btn_link ); ?>" class="btn btn-default"><span><?php echo $btn_name; ?></span></a>
							</div>
							<?php } ?>
							<div class="pa-chart-slider-five__slider__rectangle pa-chart-slider-five__slider__rectangle--four"></div>
						</div>
						<div class="pa-chart-slider-five__slider__item">
							<div class="pa-chart-slider-five__slider__header">
								<?php echo $instance['slide_five']['header']; ?>
							</div>
							<div class="pa-chart-slider-five__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-five__slider__content">
								<?php echo $instance['slide_five']['content']; ?>
							</div>
							<?php 
								$btn_link = $instance['slide_five']['link_url']; 
								$btn_name = $instance['slide_five']['link_name'];
							?>
							<?php if($btn_name) { ?>
							<div class="pa-chart-slider-five__slider__cta">
								<a href="<?php echo sow_esc_url_raw( $btn_link ); ?>" class="btn btn-default"><span><?php echo $btn_name; ?></span></a>
							</div>
							<?php } ?>
							<div class="pa-chart-slider-five__slider__rectangle pa-chart-slider-five__slider__rectangle--five"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
