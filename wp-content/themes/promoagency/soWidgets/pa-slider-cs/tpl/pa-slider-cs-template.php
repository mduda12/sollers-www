<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-slider-cs <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-slider-cs__wrapper">
					<div class="pa-slider-cs__nav">
						<span class="navigation slider-prev slider-cs-prev <?php if($alternative) : echo 'violet'; endif; ?>"></span><span class="navigation slider-next slider-cs-next"></span>
					</div>
                    <div class="pa-slider-cs-init">
                        <?php if ( ! empty( $instance['a_repeater'] ) ) : $repeater_items = $instance['a_repeater']; ?>
							<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
							<?php
                                $image = wp_get_attachment_image_url($repeater_item['image'], 'slider-cs');
                                $image_alt = get_post_meta($repeater_item['image'], '_wp_attachment_image_alt', TRUE);
								$title = $repeater_item['title'];
								$content = $repeater_item['content'];
								$url = $repeater_item['url'];
							?>
                            <article class="pa-slider-cs__box">
                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <div class="pa-slider-cs__image <?php $caption = $repeater_item['layer']; if($caption) : echo 'caption'; endif ?>">
                                            <img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
                                            <?php if($caption) : ?>
                                                <aside class="layer-cs" style="background-color: <?php echo $repeater_item['layer_color']; ?>"><?php echo $caption; ?></aside>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="pa-slider-cs__data">
                                            <span class="title pa-header__mid"><?php echo $title; ?></span>
                                            <span class="content"><?php echo $content; ?></span>
                                            <div class="row">
                                                <div class="col">
                                                    <?php if ( $alternative ) : ?>
                                                        <a href="<?php echo sow_esc_url_raw( $url ); ?>" class="btn btn-violet"><span><?php _e("See case study", "pa"); ?></span></a>
                                                    <?php else : ?>
                                                        <a href="<?php echo sow_esc_url_raw( $url ); ?>" class="btn btn-default"><span><?php _e("See case study", "pa"); ?></span></a>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</article>
                            <?php endforeach; ?>
						<?php endif; ?>
                    </div>
                </div>
			</div>
        </div>
        <div class="row">
            <div class="col">
                <div class="pa-slider-cs__all">
                    <?php $all_url = $instance['all_url']; ?>
                    <a href="<?php echo sow_esc_url_raw( $all_url ); ?>" target="_blank" class="btn btn-gray"><span><?php _e("All case studies", "pa"); ?></span></a>
                </div>
            </div>
        </div>
	</div>
</section>