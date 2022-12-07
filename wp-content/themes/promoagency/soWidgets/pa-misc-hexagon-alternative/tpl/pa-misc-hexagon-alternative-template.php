<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-misc-hexagon-alternative <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-misc-hexagon-alternative__header">
					<header class="pa-header__mid"><?php echo $instance['widget_header']['title']; ?></header>
				</div>
				<div class="pa-misc-hexagon-alternative__subheader">
					<?php echo $instance['widget_header']['subtitle']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<section class="pa-misc-hexagon-alternative__wrapper">
				<?php if ( ! empty( $instance['widget_content']['a_repeater'] ) ) : $repeater_items = $instance['widget_content']['a_repeater']; ?>
					<?php $i= 1; foreach( $repeater_items as $index => $repeater_item ) : ?>
						<?php
							$content= $repeater_item['content'];
							$reverse_content = $repeater_item['reverse_content'];
							$background = $repeater_item['bg_color'];
							$background_back = $repeater_item['bg_color_back'];

						?>
						<div class="hexagon <?php if($i == "1"): echo "flipped"; endif; ?>" style="background-color:<?php echo $background; ?>">
							<span class="box-shadow"></span>
							<div class="hexagon__front <?php if($i == "1"): echo "flipped"; endif; ?>">
								<?php echo $content; ?>
							</div>
							<div class="hexagon__back <?php if($i == "1"): echo "flipped"; endif; ?>">
								<?php echo $reverse_content; ?>
							</div>
						</div>
					<?php $i++; endforeach; ?>
				<?php endif; ?>
				</section>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-misc-hexagon-alternative__caption">
					<?php echo $instance['widget_content']['caption']; ?>
				</div>
			</div>
		</div>
	</div>
</section>
