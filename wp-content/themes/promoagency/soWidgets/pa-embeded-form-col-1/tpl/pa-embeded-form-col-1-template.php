<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-embeded-form-col-1 <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
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
		</div>
	</div>
</section>
