<section class="pa-box-icons">
	<div class="container">
		<?php $layout = $instance['widget_content']['layout']; ?>
		<?php if ( ! empty( $instance['widget_title']['header'] ) ) : ?>
		<div class="row">
			<div class="col">
				<div class="pa-box-icons__header">
					<h2 class="header pa-header__mid"><?php echo $instance['widget_title']['header']; ?></h2>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ( ! empty( $instance['widget_title']['subheader'] ) ) : ?>
		<div class="row">
			<div class="col">
				<div class="pa-box-icons__subheader pa-subheader__mid">
					<?php echo $instance['widget_title']['subheader']; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row row-equal">
			<?php if ( ! empty( $instance['widget_content']['title'] ) ) : ?>
			<div class="<?php if($layout === 'four') : echo 'col-3' ; endif; if($layout === 'three') : echo 'col-xl-4' ; endif; ?>">
				<div class="pa-box-icons__box--title h-100">
					<header class="pa-header__mid">
						<?php echo $instance['widget_content']['title']; ?>
					</header>
				</div>
			</div>
			<?php endif; ?>
			<?php if ( ! empty( $instance['widget_content']['a_repeater'] ) ) : $repeater_items = $instance['widget_content']['a_repeater']; ?>
				<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
					<?php
						$image = wp_get_attachment_image_url( $repeater_item['box_image']);
						$image_alt = get_post_meta($repeater_item['box_image'], '_wp_attachment_image_alt', TRUE);
						$content = $repeater_item['box'];
						$url = $repeater_item['url'];
						$link_target = $repeater_item['url_target'];
					?>
					<div class="col-md-6 <?php if($layout === 'four') : echo 'col-xl-3' ; endif; if($layout === 'three') : echo 'col-xl-4' ; endif; ?>">
						<div class="pa-box-icons__box h-100">
							<?php if ( $url ) : ?>
								<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>">
							<?php endif ?>	
							<article class="h-100">
								<div class="icon"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></div>
								<span class="title"><?php echo $content; ?></span>
							</article>
							<?php if ( $url ) : ?>
								</a>
							<?php endif ?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
