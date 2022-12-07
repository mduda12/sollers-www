<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-vertical-tabs <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
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
		<div class="row pa-vertical-tabs__row">
			<div class="col-md-6">
				<div class="pa-vertical-tabs__names">
					<div class="pa-vertical-tabs__nav nav" id="<?php echo $instance['tabs']['pa_tab_id']; ?>-tab" role="tablist" aria-orientation="vertical">
					
						<?php if ( ! empty( $instance['tabs']['pa_widget_tabs'] ) ) : $repeater_items = $instance['tabs']['pa_widget_tabs']; ?>
						<?php $i = 1; ?>
							<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php
								$name = $repeater_item['tab_name'];
							?>

						<a class="pa-vertical-tabs__nav__item nav-link pa-subheader__mid <?php if($i == 1) {echo "active";} ?>" id="<?php echo $instance['tabs']['pa_tab_id']; ?>-tab-<?php echo $i; ?>" data-toggle="pill" href="#<?php echo $instance['tabs']['pa_tab_id']; ?>-pills-<?php echo $i; ?>" role="tab" aria-controls="<?php echo $instance['tabs']['pa_tab_id']; ?>-pills-<?php echo $i; ?>" aria-selected="true"><?php echo $name; ?></a>

						<?php $i++; ?>
						
						<?php endforeach; ?>
						
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="pa-vertical-tabs__contents">
					<div class="tab-content" id="<?php echo $instance['tabs']['pa_tab_id']; ?>-tabContent">

					<?php if ( ! empty( $instance['tabs']['pa_widget_tabs'] ) ) : $repeater_items = $instance['tabs']['pa_widget_tabs']; ?>
					<?php $j = 1; ?>
					<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
					<?php
						$content = $repeater_item['tab_content'];
					?>

					<div class="tab-pane fade <?php if($j == 1) {echo "active show";} ?>" id="<?php echo $instance['tabs']['pa_tab_id']; ?>-pills-<?php echo $j; ?>" role="tabpanel" aria-labelledby="<?php echo $instance['tabs']['pa_tab_id']; ?>-tab-<?php echo $j; ?>"><?php echo $content; ?></div>

					<?php $j++; ?>

					<?php endforeach; ?>

					<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
