<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-misc-goqu <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="pa-misc-goqu__wrapper">	
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="pa-misc-goqu__header">
						<header class="pa-header__mid"><?php echo $instance['widget_header']['header']; ?></header>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="pa-misc-goqu__image">
						<?php
							$image = wp_get_attachment_image_url($instance['widget_header']['image'], 'full');
							$image_alt = get_post_meta($instance['widget_header']['image'], '_wp_attachment_image_alt', TRUE);
						?>
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					</div>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-lg-4">
					<div class="pa-misc-goqu__column-one">
						<header class="pa-misc-goqu__title"><?php echo $instance['column_one']['title']; ?></header>
						<div class="pa-misc-goqu__content"><?php echo $instance['column_one']['content']; ?></div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="pa-misc-goqu__column-two">
						<header class="pa-misc-goqu__title"><?php echo $instance['column_two']['title']; ?></header>
						<div class="pa-misc-goqu__content"><?php echo $instance['column_two']['content']; ?></div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="pa-misc-goqu__column-three">
						<header class="pa-misc-goqu__title"><?php echo $instance['column_three']['title']; ?></header>
						<div class="pa-misc-goqu__content"><?php echo $instance['column_three']['content']; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
