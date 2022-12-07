<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-chart-slider-atoms <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
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
		<div class="row pa-chart-slider-atoms__row">
			<div class="col-lg-7 order-lg-2 align-self-center pa-chart-slider-atoms__column">
				<div class="pa-chart-slider-atoms__image__wrap">
					<div class="pa-chart-slider-atoms__image">
						
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 850 850" style="enable-background:new 0 0 850 850;" xml:space="preserve">
					<g id="_x23_SHAPE">
						<g>
							<g>
								<g>
									<path class="st0" d="M403.6,737.4c-24,0-46.5-30.9-63.3-87.1c-16.7-55.8-25.9-130-25.9-208.9s9.2-153.1,25.9-208.9
										c16.8-56.2,39.3-87.1,63.3-87.1s46.5,30.9,63.3,87.1c16.7,55.8,25.9,130,25.9,208.9s-9.2,153.1-25.9,208.9
										C450.1,706.4,427.6,737.4,403.6,737.4z M403.6,147.3c-23.1,0-44.9,30.4-61.4,85.7c-16.6,55.6-25.8,129.6-25.8,208.3
										s9.2,152.7,25.8,208.3c16.5,55.3,38.3,85.7,61.4,85.7s44.9-30.4,61.4-85.7c16.6-55.6,25.8-129.6,25.8-208.3
										c0-78.7-9.2-152.7-25.8-208.3C448.5,177.7,426.7,147.3,403.6,147.3z"/>
								</g>
								<g>
									<path class="st1" d="M221.6,660.1c-11.8,0-21-3.1-27.3-9.5c-17-17-11-54.8,16.8-106.4c27.7-51.3,73.6-110.2,129.4-166
										c55.8-55.8,114.7-101.8,166-129.4C558.1,221,595.9,215,612.9,232c17,17,11,54.8-16.8,106.4c-27.7,51.3-73.6,110.2-129.4,166
										l-0.7-0.7l0.7,0.7c-55.8,55.8-114.7,101.8-166,129.4C268.3,651.3,241.4,660.1,221.6,660.1z M585.5,224.5
										c-19.3,0-45.9,8.8-78,26.1c-51.1,27.6-109.9,73.4-165.5,129.1S240.4,494.1,212.9,545.2c-27.4,50.8-33.5,87.7-17.2,104
										c16.3,16.3,53.3,10.2,104-17.2c51.1-27.6,109.9-73.4,165.5-129.1c55.7-55.7,101.5-114.4,129.1-165.5
										c27.4-50.8,33.5-87.7,17.2-104C605.5,227.4,596.7,224.5,585.5,224.5z"/>
								</g>
								<g>
									<path class="st2" d="M264.8,546.3c-18.8,0-36.6-0.8-53-2.6c-58.3-6.1-92.9-22.4-97.4-46.1c-4.5-23.6,21.8-51.4,73.9-78.4
										c51.8-26.7,123-49.5,200.5-64.2c77.5-14.6,152.1-19.4,210.1-13.3c58.3,6.1,92.9,22.4,97.4,46.1s-21.8,51.4-73.9,78.4
										c-51.8,26.7-123,49.5-200.5,64.2l-0.2-1l0.2,1C366.3,540.9,312.2,546.3,264.8,546.3z M545.8,341.2c-47.4,0-101.3,5.4-156.7,15.9
										c-77.3,14.6-148.4,37.3-199.9,64c-51.2,26.5-77.1,53.5-72.8,76.2c4.3,22.7,38.2,38.5,95.6,44.4c57.7,6,132.2,1.3,209.5-13.3
										c77.3-14.6,148.4-37.3,199.9-64c51.2-26.5,77.1-53.5,72.8-76.2c-4.3-22.7-38.2-38.5-95.6-44.4
										C582.2,342.1,564.5,341.2,545.8,341.2z"/>
								</g>
								<g>
									<path class="st3" d="M544.1,546.3c-47.5,0-101.5-5.4-157.1-15.9c-77.5-14.6-148.7-37.4-200.5-64.2
										c-52.1-26.9-78.3-54.8-73.9-78.4c4.5-23.6,39-40,97.4-46.1c57.9-6,132.5-1.3,210.1,13.3c77.5,14.6,148.7,37.4,200.5,64.2
										c52.1,26.9,78.3,54.8,73.9,78.4c-4.5,23.6-39,40-97.4,46.1C580.7,545.4,562.9,546.3,544.1,546.3z M387.4,528.4
										c77.3,14.6,151.7,19.3,209.5,13.3c57.4-6,91.3-21.8,95.6-44.4c4.3-22.7-21.6-49.7-72.8-76.2c-51.6-26.7-122.6-49.4-199.9-64
										c-77.3-14.6-151.7-19.3-209.5-13.3c-57.4,6-91.3,21.8-95.6,44.4c-4.3,22.7,21.6,49.7,72.8,76.2
										C239.1,491.1,310.1,513.8,387.4,528.4z"/>
								</g>
								<g>
									<path class="st4" d="M585.7,660.1c-19.8,0-46.7-8.9-79-26.3c-51.3-27.7-110.2-73.6-166-129.4s-101.8-114.7-129.4-166
										c-27.9-51.6-33.8-89.4-16.8-106.4c17-17,54.8-11,106.4,16.8c51.3,27.7,110.2,73.6,166,129.4c55.8,55.8,101.8,114.7,129.4,166
										C624,595.9,630,633.7,613,650.7C606.7,657,597.4,660.1,585.7,660.1z M221.8,224.5c-11.2,0-20,3-26,9
										c-16.3,16.3-10.2,53.3,17.2,104C240.5,388.5,286.4,447.3,342,503c55.7,55.7,114.4,101.5,165.5,129.1
										c50.8,27.4,87.7,33.5,104,17.2c16.3-16.3,10.2-53.3-17.2-104c-27.6-51.1-73.4-109.9-129.1-165.5
										C409.7,324,350.9,278.2,299.8,250.6C267.7,233.3,241.1,224.5,221.8,224.5z"/>
								</g>
							</g>
							<circle class="svg-point svg-point-circle svg-point__one svg-point-circle__one active" data-number="0" cx="405.3" cy="151" r="30.4"/>
							<circle class="svg-point svg-point__one" data-number="0" cx="405.3" cy="151" r="21.8"/>
							<text transform="matrix(1 0 0 1 <?php echo $instance['slide_one']['header_chart_position']; ?> 115.3614)" data-number="0" class="svg-point svg-point__one svg-point__name svg-point__name__one active"><?php echo $instance['slide_one']['header_chart_first']; ?></text>
							<circle class="svg-point svg-point-circle svg-point__two svg-point-circle__two" data-number="1" cx="613.3" cy="238" r="30.4"/>
							<circle class="svg-point svg-point__two" data-number="1" cx="613.3" cy="238" r="21.8"/>
							<text transform="matrix(1 0 0 1 <?php echo $instance['slide_two']['header_chart_position']; ?> 198.6113)" data-number="1" class="svg-point svg-point__one svg-point__name svg-point__name__two"><?php echo $instance['slide_two']['header_chart_first']; ?></text>
							<circle class="svg-point svg-point-circle svg-point__three svg-point-circle__three" data-number="2" cx="690.4" cy="386.15" r="30.4"/>
							<circle class="svg-point svg-point__three" data-number="2" cx="690.4" cy="386.15" r="21.8"/>
							<text transform="matrix(1 0 0 1 <?php echo $instance['slide_three']['header_chart_position']; ?> 441.8525)" data-number="2" class="svg-point svg-point__one svg-point__name svg-point__name__three"><tspan x="0" y="0"><?php echo $instance['slide_three']['header_chart_first']; ?></tspan><tspan x="0" y="28.8" ><?php echo $instance['slide_three']['header_chart_second']; ?></tspan></text>
							<circle class="svg-point svg-point-circle svg-point__four svg-point-circle__four" data-number="3" cx="119.51" cy="386.15" r="30.4"/>
							<circle class="svg-point svg-point__four" data-number="3" cx="119.51" cy="386.15" r="21.8"/>
							<text transform="matrix(1 0 0 1 <?php echo $instance['slide_four']['header_chart_position']; ?> 438.8523)" data-number="3" class="svg-point svg-point__one svg-point__name svg-point__name__four"><tspan x="0" y="0"><?php echo $instance['slide_four']['header_chart_first']; ?></tspan><tspan x="0" y="28.8"><?php echo $instance['slide_four']['header_chart_second']; ?></tspan></text>
							<circle class="svg-point svg-point-circle svg-point__five svg-point-circle__five" data-number="4" cx="197.5" cy="238" r="30.4"/>
							<circle class="svg-point svg-point__five" data-number="4" cx="197.5" cy="238" r="21.8"/>
							<text transform="matrix(1 0 0 1 <?php echo $instance['slide_five']['header_chart_position']; ?> 198.6112)" data-number="4" class="svg-point svg-point__one svg-point__name svg-point__name__five"><?php echo $instance['slide_five']['header_chart_first']; ?></text>
						</g>
					</g>
					<g id="_x23_TEXT">
						<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="365.5195" y1="440.3147" x2="397.6105" y2="440.3147">
							<stop  offset="0" style="stop-color:#9BC331"/>
							<stop  offset="1" style="stop-color:#7BA32D"/>
						</linearGradient>
						<path class="st12" d="M385.4,479.6c-2.7,0-5-2.2-5-5V406c0-2.7,2.2-5,5-5h12.2v-14.9h-12.2c-11,0-19.9,8.9-19.9,19.9v68.6
							c0,11,8.9,19.9,19.9,19.9h12.2v-14.9H385.4z"/>
						<g>
							<polygon class="st13" points="423.8,440.4 423.8,440.3 423.7,440.4 		"/>
							<polygon class="st14" points="403.6,430.6 403.6,430.6 403.6,430.6 		"/>
							<polygon class="st14" points="423.7,440.4 403.6,450.1 423.8,459.9 423.8,440.4 		"/>
							<polygon class="st14" points="449.3,472.3 449.3,452.8 438.7,447.6 438.7,467.1 		"/>
							<path class="st15" d="M438.7,406c0-11-8.9-19.9-19.9-19.9h-12.2v14.9h12.2c2.7,0,5,2.2,5,5v14.8l14.9-7.2V406z"/>
							<path class="st15" d="M423.8,440.3L423.8,440.3v19.6v14.7c0,2.7-2.2,5-5,5h-12.2v14.9h12.2c11,0,19.9-8.9,19.9-19.9v-7.5v-19.5
								v-14.5L423.8,440.3z"/>
							<polygon class="st16" points="438.7,413.6 423.8,420.8 403.6,430.6 403.6,430.6 403.6,450.1 423.7,440.4 423.8,440.3 438.7,433.1 
								457,424.3 457,404.7 		"/>
						</g>
					</g>
					</svg>
					</div>
				</div>
			</div>
			<div class="col-lg-5 order-lg-1 align-self-center pa-chart-slider-atoms__column">
				<div class="pa-chart-slider-atoms__slider__wrap">
					<div class="pa-chart-slider-atoms__slider">
						<div class="pa-chart-slider-atoms__slider__item">
							<div class="pa-chart-slider-atoms__slider__header">
								<?php echo $instance['slide_one']['header']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-atoms__slider__content">
								<?php echo $instance['slide_one']['content']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__rectangle pa-chart-slider-atoms__slider__rectangle--one"></div>
						</div>

						<div class="pa-chart-slider-atoms__slider__item">
							<div class="pa-chart-slider-atoms__slider__header">
								<?php echo $instance['slide_two']['header']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-atoms__slider__content">
								<?php echo $instance['slide_two']['content']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__rectangle pa-chart-slider-atoms__slider__rectangle--two"></div>
						</div>

						<div class="pa-chart-slider-atoms__slider__item">
							<div class="pa-chart-slider-atoms__slider__header">
								<?php echo $instance['slide_three']['header']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-atoms__slider__content">
								<?php echo $instance['slide_three']['content']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__rectangle pa-chart-slider-atoms__slider__rectangle--three"></div>
						</div>

						<div class="pa-chart-slider-atoms__slider__item">
							<div class="pa-chart-slider-atoms__slider__header">
								<?php echo $instance['slide_four']['header']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-atoms__slider__content">
								<?php echo $instance['slide_four']['content']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__rectangle pa-chart-slider-atoms__slider__rectangle--four"></div>
						</div>

						<div class="pa-chart-slider-atoms__slider__item">
							<div class="pa-chart-slider-atoms__slider__header">
								<?php echo $instance['slide_five']['header']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__nav">
								<button class="prev_btn"></button>
								<button class="next_btn"></button>
							</div>
							<div class="pa-chart-slider-atoms__slider__content">
								<?php echo $instance['slide_five']['content']; ?>
							</div>
							<div class="pa-chart-slider-atoms__slider__rectangle pa-chart-slider-atoms__slider__rectangle--five"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
