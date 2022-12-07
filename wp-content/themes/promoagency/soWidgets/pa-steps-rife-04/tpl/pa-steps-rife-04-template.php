<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $bg_section = $instance['widget_content']['checkbox']; ?>
<section class="pa-steps-rife-04 <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="pa-steps-rife-04__top">
					<div class="row no-gutters">
						<div class="col-auto">
							<div class="pa-steps-rife-04__number">
								<?php echo $instance['widget_content']['number']; ?>
							</div>
						</div>
						<div class="col">
							<div class="pa-steps-rife-04__header pa-header__mid">
								<?php echo $instance['widget_content']['header']; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="pa-steps-rife-04__content <?php if( $bg_section ) { echo 'background'; } ?>">
					<div class="row">
						<div class="col">
							<?php echo $instance['widget_content']['content']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="pa-steps-rife-04__chart">
					<?php 
						$image = wp_get_attachment_image_url($instance['chart']['chart_image'], 'chart-image-320'); 
						$image_alt = get_post_meta($instance['chart']['chart_image'], '_wp_attachment_image_alt', TRUE);
						$header_1 = $instance['chart']['tooltip_one_header'];
						$header_2 = $instance['chart']['tooltip_two_header'];
						$header_3 = $instance['chart']['tooltip_three_header'];
						$header_4 = $instance['chart']['tooltip_four_header'];
						$tooltip_1 = $instance['chart']['tooltip_one_content'];
						$tooltip_2 = $instance['chart']['tooltip_two_content'];
						$tooltip_3 = $instance['chart']['tooltip_three_content'];
						$tooltip_4 = $instance['chart']['tooltip_four_content'];
					?>
					<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">
					<div class="pa-steps-rife-04__button-header header-one"><header><?php echo $header_1; ?></header></div>
					<div class="pa-steps-rife-04__button-header header-two"><header><?php echo $header_2; ?></header></div>
					<div class="pa-steps-rife-04__button-header header-three active"><header><?php echo $header_3; ?></header></div>
					<div class="pa-steps-rife-04__button-header header-four"><header><?php echo $header_4; ?></header></div>
					<div class="pa-steps-rife-04__button button-one">
						<button>
							<div class="pa-steps-rife-04__tooltip tooltip-one">
								<header><?php echo $header_1; ?></header>
								<?php echo $tooltip_1; ?>
								<div class="arrow"></div>
							</div>
						</button>
					</div>
					<div class="pa-steps-rife-04__button button-two">
						<button>
							<div class="pa-steps-rife-04__tooltip tooltip-two">
								<header><?php echo $header_2; ?></header>
								<?php echo $tooltip_2; ?>
								<div class="arrow"></div>
							</div>
						</button>
					</div>
					<div class="pa-steps-rife-04__button button-three active">
						<button>
							<div class="pa-steps-rife-04__tooltip tooltip-three active">
								<header><?php echo $header_3; ?></header>
								<?php echo $tooltip_3; ?>
								<div class="arrow"></div>
							</div>
						</button>
					</div>
					<div class="pa-steps-rife-04__button button-four">
						<button>
							<div class="pa-steps-rife-04__tooltip tooltip-four">
								<header><?php echo $header_4; ?></header>
								<?php echo $tooltip_4; ?>
								<div class="arrow"></div>
							</div>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
