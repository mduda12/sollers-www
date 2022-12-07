<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-bats-measure <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
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
			<div class="col-lg-4">
				<div class="pa-bats-measure__left">
					<div class="pa-bats-measure__box pa-bats-measure__box--one">
						<?php echo $instance['boxes']['box_one']; ?>
						<div class="pa-bats-measure__box--one--line">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/img/BATS-measure-line1.png" alt="line">
						</div>
					</div>
					<div class="pa-bats-measure__box pa-bats-measure__box--two">
						<?php echo $instance['boxes']['box_two']; ?>
						<div class="pa-bats-measure__box--two--line">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/img/BATS-measure-line2.png" alt="line">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa-bats-measure__image__wrap">
					<div class="pa-bats-measure__image">
						<?php 
							$image = wp_get_attachment_image_url($instance['center_image']['image'], 'full'); 
							$image_alt = get_post_meta($instance['center_image']['image'], '_wp_attachment_image_alt', TRUE);
						?>
							<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa-bats-measure__right">
					<div class="pa-bats-measure__box pa-bats-measure__box--three">
						<?php echo $instance['boxes']['box_three']; ?>
						<div class="pa-bats-measure__box--three--line">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/img/BATS-measure-line3.png" alt="line">
						</div>
					</div>
					<div class="pa-bats-measure__box pa-bats-measure__box--four">
						<?php echo $instance['boxes']['box_four']; ?>
						<div class="pa-bats-measure__box--four--line">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/img/BATS-measure-line4.png" alt="line">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
