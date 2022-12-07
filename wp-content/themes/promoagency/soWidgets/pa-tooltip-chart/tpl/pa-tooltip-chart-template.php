<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-tooltip-chart <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="pa-tooltip-chart__col--left">
				<?php if($instance['content_col']['pa_col_header']) {?>
					<div class="pa-widget__header pa-header__mid">
						<?php echo $instance['content_col']['pa_col_header']; ?>
					</div>
				<?php } ?>
				<?php if($instance['content_col']['pa_col_desc']) {?>
					<div class="pa-widget__subheader">
						<?php echo $instance['content_col']['pa_col_desc']; ?>
					</div>
				<?php } ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="pa-tooltip-chart__image">
					<div class="pa-tooltip-chart__top">
						<div class="pa-tooltip-chart__top--left">
							<div class="pa-tooltip-chart__top__header">
								<?php echo $instance['chart_col']['tooltip_one_header']; ?>
							</div>
							<div class="pa-tooltip-chart__top__subheader">
								<?php echo $instance['chart_col']['tooltip_one_subheader']; ?>
							</div>
						</div>
						<div class="pa-tooltip-chart__top--right">
							<div class="pa-tooltip-chart__top__header">
								<?php echo $instance['chart_col']['tooltip_two_header']; ?>
							</div>
							<div class="pa-tooltip-chart__top__subheader">
								<?php echo $instance['chart_col']['tooltip_two_subheader']; ?>
							</div>
						</div>
					</div>
					<div class="pa-tooltip-chart__image__wrap">
						<div class="pa-tooltip-chart__image__item">
							<?php 
							$image = wp_get_attachment_image_url($instance['chart_col']['chart_image'], 'chart-image-350'); 
							$image_alt = get_post_meta($instance['chart_col']['chart_image'], '_wp_attachment_image_alt', TRUE);
							?>
							<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">
							<div class="pa-tooltip-chart__button pa-tooltip-chart__button--one">
								<button>
									<div class="pa-tooltip-chart-text">
										<?php echo $instance['chart_col']['tooltip_one_content']; ?>
										<div class="pa-tooltip-chart-text--arrow">
											<img src="<?php echo get_template_directory_uri(); ?>/dist/img/tooltip-arrow-up-white.png" alt="arrow">
										</div>
									</div>
								</button>
							</div>
							<div class="pa-tooltip-chart__button pa-tooltip-chart__button--two">
								<button>
									<div class="pa-tooltip-chart-text">
										<?php echo $instance['chart_col']['tooltip_two_content']; ?>
										<div class="pa-tooltip-chart-text--arrow">
											<img src="<?php echo get_template_directory_uri(); ?>/dist/img/tooltip-arrow-up-white.png" alt="arrow">
										</div>
									</div>
								</button>
							</div>
							<div class="pa-tooltip-chart__button pa-tooltip-chart__button--three">
								<button>
									<div class="pa-tooltip-chart-text">
										<?php echo $instance['chart_col']['tooltip_three_content']; ?>
										<div class="pa-tooltip-chart-text--arrow">
											<img src="<?php echo get_template_directory_uri(); ?>/dist/img/tooltip-arrow-up-white.png" alt="arrow">
										</div>
									</div>
								</button>
							</div>
						</div>
					</div>
					<div class="pa-tooltip-chart__bottom">
						<div class="pa-tooltip-chart__bottom--right">
							<div class="pa-tooltip-chart__top__header">
								<?php echo $instance['chart_col']['tooltip_three_header']; ?>
							</div>
							<div class="pa-tooltip-chart__top__subheader">
								<?php echo $instance['chart_col']['tooltip_three_subheader']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
