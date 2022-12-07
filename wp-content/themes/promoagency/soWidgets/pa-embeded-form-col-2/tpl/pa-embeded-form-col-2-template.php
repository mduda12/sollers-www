<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-embeded-form-col-2 <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<?php foreach( $instance['ordering'] as $item ) { switch( $item ) { case 'left' : ?>
			<div class="col-lg-6 <?php if ($right === 'on') : echo 'order-1 order-lg-2'; endif; ?>">
			<?php if($instance['column_form']['header']) {?>
				<div class="pa-embeded-form-col-2__header pa-header__mid">
					<?php echo $instance['column_form']['header']; ?>
				</div>
			<?php } ?>
			<?php if($instance['column_form']['subheader']) {?>
				<div class="pa-embeded-form-col-2__subheader">
					<?php echo $instance['column_form']['subheader']; ?>
				</div>
			<?php } ?>
				<div class="pa-embeded-form-col-2__form">
					<?php echo $instance['column_form']['form']; ?>
				</div>
			</div>
			<?php break; case 'right' : $right = 'on' ;?>
			<div class="col-lg-6 <?php if ($right === 'on') : echo 'order-2 order-lg-1'; endif; ?>">
				<?php if($instance['column_image']['header']) {?>
					<div class="pa-embeded-form-col-2__header pa-header__mid">
						<?php echo $instance['column_image']['header']; ?>
					</div>
				<?php } ?>
				<?php if($instance['column_image']['subheader']) {?>
					<div class="pa-embeded-form-col-2__subheader">
						<?php echo $instance['column_image']['subheader']; ?>
					</div>
				<?php } ?>
				<?php if($instance['column_image']['image']) {?>
				<?php 
					$image = wp_get_attachment_image_url($instance['column_image']['image'], 'slider-cs'); 
					$image_alt = get_post_meta($instance['column_image']['image'], '_wp_attachment_image_alt', TRUE);	
				?>
					<div class="pa-embeded-form-col-2__image">
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-fluid">
					</div>
				<?php } ?>
			</div>
			<?php break; } } ?>
		</div>
	</div>
</section>
