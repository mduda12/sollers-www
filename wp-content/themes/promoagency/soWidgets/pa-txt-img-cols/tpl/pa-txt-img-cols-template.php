<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $left_col_bg = $instance['left_col']['pa_col_bg']; ?>
<?php $right_col_bg = $instance['right_col']['pa_col_bg']; ?>
<section class="pa-two-cols <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="pa-left-col__wrap <?php if($left_col_bg === true) { echo 'pa-left-col__wrap--bg';} ?>">
					<?php if($instance['left_col']['pa_col_image']) {?>
						<div class="pa-col__image">
							<?php echo $instance['left_col']['pa_col_image']; ?>
						</div>
					<?php } ?>
					<?php if($instance['left_col']['pa_col_header']) {?>
						<div class="pa-col__header pa-header__mid">
							<?php echo $instance['left_col']['pa_col_header']; ?>
						</div>
					<?php } ?>
					<?php if($instance['left_col']['pa_col_subheader']) {?>
						<div class="pa-col__subheader">
							<?php echo $instance['left_col']['pa_col_subheader']; ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="pa-right-col__wrap <?php if($right_col_bg === true) { echo 'pa-left-col__wrap--bg';} ?>">
					<?php if($instance['right_col']['pa_col_image']) {?>
						<div class="pa-col__image">
							<?php echo $instance['right_col']['pa_col_image']; ?>
						</div>
					<?php } ?>
					<?php if($instance['right_col']['pa_col_header']) {?>
						<div class="pa-col__header pa-header__mid">
							<?php echo $instance['right_col']['pa_col_header']; ?>
						</div>
					<?php } ?>
					<?php if($instance['right_col']['pa_col_subheader']) {?>
						<div class="pa-col__subheader">
							<?php echo $instance['right_col']['pa_col_subheader']; ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
