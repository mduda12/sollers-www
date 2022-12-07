<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-txt-header-universal <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-txt-header-universal__header pa-header__mid">
					<?php echo $instance['widget_content']['header']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-txt-header-universal__content">
					<?php echo $instance['widget_content']['content']; ?>
				</div>
			</div>
		</div>
	</div>
</section>
