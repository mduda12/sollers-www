<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-misc-goqu-counter <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-misc-goqu-counter__wrapper pa-number-counter">
					<span class="quote-before"></span>
					<span class="quote-after"></span>
					<div class="pa-misc-goqu-counter__before">
						<?php echo $instance['widget_content']['before']; ?>
					</div>
					<div class="pa-misc-goqu-counter__number number-counter-value" data-count="<?php echo $instance['widget_content']['number']; ?>">
						0
					</div>
					<div class="pa-misc-goqu-counter__after">
						<?php echo $instance['widget_content']['after']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
