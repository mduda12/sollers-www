<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-misc-hexagon <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-misc-hexagon__header">
					<header class="pa-header__mid"><?php echo $instance['widget_header']['title']; ?></header>
				</div>
				<div class="pa-misc-hexagon__subheader">
					<?php echo $instance['widget_header']['subtitle']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<section class="pa-misc-hexagon__wrapper">
				<?php if ( ! empty( $instance['widget_content']['a_repeater'] ) ) : $repeater_items = $instance['widget_content']['a_repeater']; ?>
					<?php $i= 1; foreach( $repeater_items as $index => $repeater_item ) : ?>
						<?php
							$title = $repeater_item['title'];
							$reverse_title = $repeater_item['reverse_title'];
							$reverse_content = $repeater_item['reverse_content'];
							$background = $repeater_item['bg_color'];
							$background_back = $repeater_item['bg_color_back'];
							$popup = $repeater_item['reverse_popup'];
						?>
				
						<div class="hexagon <?php if($i == "1"): echo "flipped"; endif; ?>" style="background-color:<?php echo $background; ?>">
							<span class="box-shadow"></span>
							<span class="box-arrow <?php if($i == "1"): echo "flipped"; endif; ?>"></span>
							<div class="hexagon__front <?php if($i == "1"): echo "flipped"; endif; ?>">
								<?php echo $title; ?>
							</div>
							<div class="hexagon__back <?php if($i == "1"): echo "flipped"; endif; ?>">
								<header><?php echo $reverse_title; ?></header>
								<?php echo $reverse_content; ?>
								<?php if($popup) : ?><div class="hexagon__indicator" data-toggle="modal" data-target="#hexagonModal-<?php echo $i; ?>"><?php _e(">> MORE <<", "pa"); ?></div><?php endif; ?>
							</div>
							<span class="box-number <?php if($i == "1"): echo "flipped"; endif; ?>">0<?php echo $i; ?></span>
							<div class="hexagon__popup">
								<?php if($popup) : ?>
								<!-- The Modal -->
								<div class="modal fade widgetModal hexagonal" id="hexagonModal-<?php echo $i; ?>">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<!-- Modal Header -->
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<!-- Modal body -->
											<div class="modal-body">
												<?php echo $popup; ?>
											</div>                                        
										</div>
									</div>
								</div>
								<!-- The Modal END -->
								<?php endif; ?>
							</div>
						</div>
					<?php $i++; endforeach; ?>
				<?php endif; ?>
				</section>
			</div>
		</div>
	</div>
</section>
