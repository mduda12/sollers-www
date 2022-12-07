<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-chart-bats <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="pa-chart-bats__column pa-chart-bats__column--one">
					<div class="pa-chart-bats__header pa-header__mid">
						<?php echo $instance['text_column']['header']; ?>
					</div>
					<div class="pa-chart-bats__text">
						<?php echo $instance['text_column']['content']; ?>
					</div>
					<div class="pa-chart-bats__note">
						<?php echo $instance['text_column']['note']; ?>
					</div>
				</div>
				
			</div>
			<div class="col-lg-6">
				<div class="pa-chart-bats__column pa-chart-bats__column--two">
					<div class="pa-chart-bats__chart">
						<div class="pa-chart-bats__chart__left">			
							<div class="pa-chart-bats__chart__name pa-chart-bats__chart__name--six"><?php echo $instance['chart_column']['chart_image_header_six']; ?></div>
							<div class="pa-chart-bats__chart__name pa-chart-bats__chart__name--five"><?php echo $instance['chart_column']['chart_image_header_five']; ?></div>
						</div>
						<div class="pa-chart-bats__chart__center">
							<div class="pa-chart-bats__chart__name pa-chart-bats__chart__name--one"><?php echo $instance['chart_column']['chart_image_header_one']; ?></div>
							<?php 
							$image = wp_get_attachment_image_url($instance['chart_column']['chart_image'], 'full'); 
							$image_alt = get_post_meta($instance['chart_column']['chart_image'], '_wp_attachment_image_alt', TRUE);
							?>
							<div class="pa-chart-bats__chart__image"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid"></div>
							<div class="pa-chart-bats__chart__name pa-chart-bats__chart__name--four"><?php echo $instance['chart_column']['chart_image_header_four']; ?></div>

						</div>
						<div class="pa-chart-bats__chart__right">
							<div class="pa-chart-bats__chart__name pa-chart-bats__chart__name--two"><?php echo $instance['chart_column']['chart_image_header_two']; ?></div>
							<div class="pa-chart-bats__chart__name pa-chart-bats__chart__name--three"><?php echo $instance['chart_column']['chart_image_header_three']; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
