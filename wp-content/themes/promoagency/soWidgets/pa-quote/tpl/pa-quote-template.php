<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-quote <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-quote__wrapper">
					<span class="quote-before"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/quote.png" alt="<img src="<?php _e("Quote", "pa"); ?>"></span>
					<span class="quote-after"></span>
					<?php if ( ! empty( $instance['a_repeater'] ) ) : $repeater_items = $instance['a_repeater']; ?>
						<div class="pa-slider-quote-init">
							<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
								<?php
									$quote = $repeater_item['quote'];
									$description = $repeater_item['description'];
									$author = $repeater_item['author'];
									$position = $repeater_item['position'];
									$authorImage = wp_get_attachment_image_url($repeater_item['author_image'], 'core-slider');
									$authorImageAlt = get_post_meta($repeater_item['author_image'], '_wp_attachment_image_alt', TRUE);
								?>
								<article class="pa-quote__box">
									<div class="pa-quote__data">
										<div class="quote"><?php echo $quote; ?></div>
										<?php if($authorImage) : ?><div class="author-image"><img src="<?php echo $authorImage; ?>" alt="<?php echo $authorImageAlt; ?>"></div><?php endif; ?>
										<div class="author"><?php echo $author; ?></div>
										<div class="position"><?php echo $position; ?></div>
										<div class="description"><?php echo $description; ?></div>
									</div>
								</article>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
