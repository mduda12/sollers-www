<?php $background = wp_get_attachment_image_url($instance['widget_settings']['widget_bg_image'], 'full');; ?>
<section class="pa-quote-alternative" <?php if( $background ) : ?>style="background-image:url(<?php echo $background; ?>)"<?php endif; ?>>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-quote-alternative__wrapper">
					<span class="quote-before"></span>
					<span class="quote-after"></span>
					<?php if ( ! empty( $instance['a_repeater'] ) ) : $repeater_items = $instance['a_repeater']; ?>
						<div class="pa-slider-quote-init">
							<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
								<?php
									$header = $repeater_item['header'];
									$quote = $repeater_item['quote'];
									$description = $repeater_item['description'];
									$author = $repeater_item['author'];
									$position = $repeater_item['position'];
									$authorImage = wp_get_attachment_image_url($repeater_item['author_image'], 'core-slider');
									$authorImageAlt = get_post_meta($repeater_item['author_image'], '_wp_attachment_image_alt', TRUE);
								?>
								<article class="pa-quote-alternative__box">
									<div class="pa-quote-alternative__data">
										<div class="header pa-header__mid"><?php echo $header; ?></div>
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
