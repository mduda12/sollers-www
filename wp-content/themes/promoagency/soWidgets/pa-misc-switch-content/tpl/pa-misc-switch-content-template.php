<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $background_image = wp_get_attachment_image_url($instance['widget_settings']['widget_bg_image'], 'full'); ?>
<section class="pa-misc-switch-content <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="pa-misc-switch-content__wrapper" <?php if( $background_image ) : ?>style="background-image:url(<?php echo $background_image; ?>)"<?php endif; ?>>
		<div class="container">
			<!-- Tabs -->
			<?php
				$imageOne = wp_get_attachment_image_url($instance['tab_one']['image'], 'full');
				$imageTwo = wp_get_attachment_image_url($instance['tab_two']['image'], 'full');
			?>
			<aside class="tab">
				<div class="row no-gutters">
					<div class="col-md-6">
						<div id="tab-one" class="pa-misc-switch-content__tab-one tab-scroll" style="background-image: url(<?php echo $imageOne; ?>)">
							<div class="title"><?php echo $instance['tab_one']['title']; ?></div>
							<a href="#content-one" class="btn btn-full-white--border"><span><?php _e("Read more", "pa"); ?></span></a>  
							<div class="layer"></div>
							<div class="arrow-down"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/tab-active.jpg" alt="<?php _e("Arrow Down", "pa"); ?>" /></div>
						</div>
					</div>
					<div class="col-md-6">
						<div id="tab-two" class="pa-misc-switch-content__tab-two tab-scroll" style="background-image: url(<?php echo $imageTwo; ?>)">
							<div class="title"><?php echo $instance['tab_two']['title']; ?></div>
							<a href="#content-two" class="btn btn-full-white--border"><span><?php _e("Read more", "pa"); ?></span></a>  
							<div class="layer"></div>
							<div class="arrow-down"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/tab-active.jpg" alt="<?php _e("Arrow Down", "pa"); ?>" /></div>
						</div>
					</div>
				</div>
			</aside>
			<!-- END: Tabs -->
			<!-- Content - one -->
			<section id="content-one" class="content-one">
				<div class="row">
					<div class="col">
						<div class="header-one">
							<header class="pa-header__mid"><?php echo $instance['tab_one']['title_content']; ?></header>
							<span id="close-one"><?php _e("Close", "pa"); ?> <img src="<?php echo get_template_directory_uri(); ?>/dist/img/bats-card-arrow-up.png" alt="<?php _e("Arrow Up", "pa"); ?>" /></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<?php if ( ! empty( $instance['repeater_one'] ) ) : $repeater_items = $instance['repeater_one']; ?>
							<?php $i = 1; foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php 
								$li_underline = $repeater_item['item_content']['li_underline'];
								$bg_section = $repeater_item['item_content']['checkbox']; 
								$top_padding = $repeater_item['item_content']['top_padding']; 
								$bottom_padding = $repeater_item['item_content']['bottom_padding']; 
							?>
							<section class="pa-misc-switch-content__content-one" style="padding-top:<?php echo $top_padding ?>; padding-bottom:<?php echo $bottom_padding ?>">
								<div class="row no-gutters">
									<div class="col-lg-6 <?php if ( ($i % 2) == 0 ) : echo 'order-lg-1'; endif; ?>">
										<div class="pa-misc-switch-content__content-one__wrapper h-100 <?php if( $bg_section ) { echo 'background'; } ?>">
											<div class="pa-misc-switch-content__content-one__header pa-header__mid">
												<div class="row">
													<div class="col">
														<?php echo $repeater_item['item_content']['header']; ?>
													</div>
												</div>
											</div>
											<div class="pa-misc-switch-content__content-one__content <?php if( $li_underline ) { echo 'li_nounderline'; } ?>">
												<div class="row">
													<div class="col">
														<?php echo $repeater_item['item_content']['content']; ?>
													</div>
												</div>
											</div>
											<?php								
												$url_name = $repeater_item['item_content']['url_name'];
												$url = $repeater_item['item_content']['url'];
												$link_target = $repeater_item['item_content']['url_target'];
												if ($url_name && $url) :
											?>
											<div class="pa-misc-switch-content__content-one__button">
												<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php echo $url_name; ?></span></a>
											</div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-lg-6 <?php if ( ($i % 2) !== 0 ) : echo 'order-lg-2'; endif; ?>">
										<div class="pa-misc-switch-content__content-one__image">
											<?php
												$image = wp_get_attachment_image_url($repeater_item['item_content']['image'], 'slider-cs');
												$image_alt = get_post_meta($repeater_item['item_content']['image'], '_wp_attachment_image_alt', TRUE);
											?>
											<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
										</div>
									</div>
								</div>
							</section>
							<?php $i++; endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<!-- END: Content - one -->
			<!-- Content - two -->
			<section id="content-two" class="content-two">
				<div class="row">
					<div class="col">
						<div class="header-two">
							<header class="pa-header__mid"><?php echo $instance['tab_two']['title_content']; ?></header>
							<span id="close-two"><?php _e("Close", "pa"); ?> <img src="<?php echo get_template_directory_uri(); ?>/dist/img/bats-card-arrow-up.png" alt="<?php _e("Arrow Up", "pa"); ?>" /></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<?php if ( ! empty( $instance['repeater_two'] ) ) : $repeater_items = $instance['repeater_two']; ?>
							<?php $i = 1; foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php 
								$li_underline = $repeater_item['item_content']['li_underline'];
								$bg_section = $repeater_item['item_content']['checkbox']; 
								$top_padding = $repeater_item['item_content']['top_padding']; 
								$bottom_padding = $repeater_item['item_content']['bottom_padding']; 
							?>
							<section class="pa-misc-switch-content__content-two" style="padding-top:<?php echo $top_padding ?>; padding-bottom:<?php echo $bottom_padding ?>">
								<div class="row no-gutters">
									<div class="col-lg-6 <?php if ( ($i % 2) == 0 ) : echo 'order-lg-1'; endif; ?>">
										<div class="pa-misc-switch-content__content-two__wrapper h-100 <?php if( $bg_section ) { echo 'background'; } ?>">
											<div class="pa-misc-switch-content__content-two__header pa-header__mid">
												<div class="row">
													<div class="col">
														<?php echo $repeater_item['item_content']['header']; ?>
													</div>
												</div>
											</div>
											<div class="pa-misc-switch-content__content-two__content <?php if( $li_underline ) { echo 'li_nounderline'; } ?>">
												<div class="row">
													<div class="col">
														<?php echo $repeater_item['item_content']['content']; ?>
													</div>
												</div>
											</div>
											<?php								
												$url_name = $repeater_item['item_content']['url_name'];
												$url = $repeater_item['item_content']['url'];
												$link_target = $repeater_item['item_content']['url_target'];
												if ($url_name && $url) :
											?>
											<div class="pa-misc-switch-content__content-two__button">
												<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php echo $url_name; ?></span></a>
											</div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-lg-6 <?php if ( ($i % 2) !== 0 ) : echo 'order-lg-2'; endif; ?>">
										<div class="pa-misc-switch-content__content-two__image">
											<?php
												$image = wp_get_attachment_image_url($repeater_item['item_content']['image'], 'slider-cs');
												$image_alt = get_post_meta($repeater_item['item_content']['image'], '_wp_attachment_image_alt', TRUE);
											?>
											<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
										</div>
									</div>
								</div>
							</section>
							<?php $i++; endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<!-- END: Content - two -->
		</div>
	</div>
</section>
