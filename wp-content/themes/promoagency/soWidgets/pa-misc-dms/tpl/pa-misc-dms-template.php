<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $bg_section = $instance['widget_content']['checkbox']; ?>
<section class="pa-misc-dms <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<?php foreach( $instance['ordering'] as $item ) { switch( $item ) { case 'left' : ?>
			<div class="col-lg-6">
				<div class="pa-misc-dms__wrapper h-100 <?php if( $bg_section ) { echo 'background'; } ?>">
					<div class="pa-misc-dms__header pa-header__mid">
						<div class="row">
							<div class="col">
								<?php echo $instance['widget_content']['header']; ?>
							</div>
						</div>
					</div>
					<div class="pa-misc-dms__content">
						<div class="row">
							<div class="col">
								<?php echo $instance['widget_content']['content']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php break; case 'right' : ?>
			<div class="col-lg-6">
				<div class="pa-misc-dms__chart">
					<?php 
						$image = wp_get_attachment_image_url($instance['chart']['chart_image'], 'chart-image-410'); 
						$image_alt = get_post_meta($instance['chart']['chart_image'], '_wp_attachment_image_alt', TRUE);
						$tooltip_1 = $instance['chart']['tooltip_one_content'];
						$tooltip_2 = $instance['chart']['tooltip_two_content'];
						$tooltip_3 = $instance['chart']['tooltip_three_content'];
						$tooltip_4 = $instance['chart']['tooltip_four_content'];
						$tooltip_5 = $instance['chart']['tooltip_five_content'];
						$chart_text = $instance['chart']['chart_image_text'];
					?>
					<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					<div class="pa-misc-dms__button button-one active">
						<button>
							<div class="pa-misc-dms__tooltip tooltip-one active">
								<?php echo $tooltip_1; ?>
								<div class="arrow"></div>
							</div>
						</button>
					</div>
					<div class="pa-misc-dms__button button-two">
						<button>
							<div class="pa-misc-dms__tooltip tooltip-two">
								<?php echo $tooltip_2; ?>
								<div class="arrow"></div>
							</div>
						</button>
					</div>
					<div class="pa-misc-dms__button button-three">
						<button>
							<div class="pa-misc-dms__tooltip tooltip-three">
								<?php echo $tooltip_3; ?>
								<div class="arrow"></div>
							</div>
						</button>
					</div>
					<div class="pa-misc-dms__button button-four">
						<button>
							<div class="pa-misc-dms__tooltip tooltip-four">
								<?php echo $tooltip_4; ?>
								<div class="arrow"></div>
							</div>
						</button>
					</div>
					<div class="pa-misc-dms__button button-five">
						<button>
							<div class="pa-misc-dms__tooltip tooltip-five">
								<?php echo $tooltip_5; ?>
								<div class="arrow"></div>
							</div>
						</button>
					</div>
				</div>
				<div class="pa-misc-dms__chart__text">
					<?php echo $chart_text; ?>
				</div>
			</div>
			<?php break; } } ?>
		</div>
	</div>
</section>
