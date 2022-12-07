<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-txt-img-bats <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="pa-txt-img-bats__left__wrap">
					<div class="pa-txt-img-bats__left">
					<?php if($instance['text_column']['header']) {?>
						<div class="pa-txt-img-bats__header pa-header__mid">
							<?php echo $instance['text_column']['header']; ?>
						</div>
					<?php } ?>
					<?php if($instance['text_column']['subheader']) {?>
						<div class="pa-txt-img-bats__subheader">
							<?php echo $instance['text_column']['subheader']; ?>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="pa-txt-img-bats__right__wrap">
					<div class="pa-txt-img-bats__right">
					<?php 
						$image = wp_get_attachment_image_url($instance['image_column']['image'], 'full'); 
						$image_alt = get_post_meta($instance['image_column']['image'], '_wp_attachment_image_alt', TRUE);
					?>
						<div class="pa-txt-img-bats__image">
							<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
