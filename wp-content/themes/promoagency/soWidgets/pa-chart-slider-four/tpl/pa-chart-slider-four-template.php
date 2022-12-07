<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-chart-slider-four <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
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
		<div class="row pa-chart-slider-four__row">
			<div class="col-lg-6 order-lg-2 align-self-center pa-chart-slider-four__column">
				<div class="pa-chart-slider-four__image__wrap">
					<div class="pa-chart-slider-four__image">
						<?php 
							$image = wp_get_attachment_image_url($instance['chart_column']['chart_image'], 'full'); 
							$image_alt = get_post_meta($instance['chart_column']['chart_image'], '_wp_attachment_image_alt', TRUE);
						?>
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">
						<div class="pa-chart-slider-four__image__point pa-chart-slider-four__image__point--one">
							<button class="pa-chart-slider-four__button active" data-number="0"></button>
						</div>
						<div class="pa-chart-slider-four__image__point pa-chart-slider-four__image__point--two">
							<button class="pa-chart-slider-four__button" data-number="1"></button>
						</div>
						<div class="pa-chart-slider-four__image__point pa-chart-slider-four__image__point--three">
							<button class="pa-chart-slider-four__button" data-number="2"></button>
						</div>
						<div class="pa-chart-slider-four__image__point pa-chart-slider-four__image__point--four">
							<button class="pa-chart-slider-four__button" data-number="3"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 order-lg-1 align-self-center pa-chart-slider-four__column">
				<div class="pa-chart-slider-four__slider__wrap">
					<div class="pa-chart-slider-four__slider">
						<div class="pa-chart-slider-four__slider__item">
							<div class="pa-chart-slider-four__slider__header">
								<?php echo $instance['slide_one']['header']; ?>
							</div>
							<div class="pa-chart-slider-four__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-four__slider__content">
								<?php echo $instance['slide_one']['content']; ?>
							</div>
							<div class="pa-chart-slider-four__slider__rectangle pa-chart-slider-four__slider__rectangle--one"></div>
						</div>

						<div class="pa-chart-slider-four__slider__item">
							<div class="pa-chart-slider-four__slider__header">
								<?php echo $instance['slide_two']['header']; ?>
							</div>
							<div class="pa-chart-slider-four__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-four__slider__content">
								<?php echo $instance['slide_two']['content']; ?>
							</div>
							<div class="pa-chart-slider-four__slider__rectangle pa-chart-slider-four__slider__rectangle--two"></div>
						</div>

						<div class="pa-chart-slider-four__slider__item">
							<div class="pa-chart-slider-four__slider__header">
								<?php echo $instance['slide_three']['header']; ?>
							</div>
							<div class="pa-chart-slider-four__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-four__slider__content">
								<?php echo $instance['slide_three']['content']; ?>
							</div>
							<div class="pa-chart-slider-four__slider__rectangle pa-chart-slider-four__slider__rectangle--three"></div>
						</div>

						<div class="pa-chart-slider-four__slider__item">
							<div class="pa-chart-slider-four__slider__header">
								<?php echo $instance['slide_four']['header']; ?>
							</div>
							<div class="pa-chart-slider-four__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-four__slider__content">
								<?php echo $instance['slide_four']['content']; ?>
							</div>
							<div class="pa-chart-slider-four__slider__rectangle pa-chart-slider-four__slider__rectangle--four"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
