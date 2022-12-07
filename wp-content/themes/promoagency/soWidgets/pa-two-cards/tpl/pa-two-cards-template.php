<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-two-cards <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 pa-two-cards--one">
				<div class="pa-two-cards__item">
					<div class="pa-two-cards__item__header pa-two-cards__item__header--one">
						<?php echo $instance['card_one']['header']; ?>
					</div>
					<div class="pa-two-cards__item__bottom">
						<div class="pa-two-cards__item__subheader">
							<?php echo $instance['card_one']['subheader']; ?>
						</div>
						<div class="pa-two-cards__item__desc">
							<?php echo $instance['card_one']['content']; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 pa-two-cards--two">
				<div class="pa-two-cards__item">
					<div class="pa-two-cards__item__header pa-two-cards__item__header--two">
						<?php echo $instance['card_two']['header']; ?>
					</div>
					<div class="pa-two-cards__item__bottom">
						<div class="pa-two-cards__item__subheader">
							<?php echo $instance['card_two']['subheader']; ?>
						</div>
						<div class="pa-two-cards__item__desc">
							<?php echo $instance['card_two']['content']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
