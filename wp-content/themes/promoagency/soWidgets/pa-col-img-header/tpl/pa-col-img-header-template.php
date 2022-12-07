<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-col-img-header <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<?php
			$link_name = $instance['widget_btn']['btn_top_name'];
			$url = $instance['widget_btn']['btn_top_url'];
			$link_target = $instance['widget_btn']['btn_top_url_target'];
			if($url && $link_name) :
		?>
		<div class="row">
			<div class="col">
				<div class="pa-col-img-header__btn btn-top">
				<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-full-green"><span><?php echo $link_name; ?></span></a>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col">
				<div class="pa-col-img-header__header pa-header__mid">
					<?php echo $instance['widget_header']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-col-img-header__subheader">
					<?php echo $instance['widget_subheader']; ?>
				</div>
			</div>
		</div>
		<?php if ( ! empty( $instance['a_repeater'] ) ) : $repeater_items = $instance['a_repeater']; ?>
		<div class="row">
			<?php foreach( $repeater_items as $index => $repeater_item ) : ?>
				<?php
					$image = wp_get_attachment_image_url($repeater_item['image'], 'full');
					$image_alt = get_post_meta($repeater_item['image'], '_wp_attachment_image_alt', TRUE);
					$header = $repeater_item['header'];
					$subheader = $repeater_item['subheader'];
				?>
				<div class="col-md">
					<div class="pa-col-img-header__box">
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
						<header><?php echo $header; ?></header>
						<aside><?php echo $subheader; ?></aside>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<?php
			$link_name = $instance['widget_btn']['btn_bottom_name'];
			$url = $instance['widget_btn']['btn_bottom_url'];
			$link_target = $instance['widget_btn']['btn_bottom_url_target'];
			if($url && $link_name) :
		?>
		<div class="row">
			<div class="col">
				<div class="pa-col-img-header__btn btn-bottom">
				<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-full-green"><span><?php echo $link_name; ?></span></a>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
