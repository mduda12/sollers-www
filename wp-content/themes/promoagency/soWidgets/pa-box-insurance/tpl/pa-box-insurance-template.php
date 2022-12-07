<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-box-insurance <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-box-insurance__header pa-header__mid">
					<?php echo $instance['widget_header']; ?>
				</div>
			</div>
		</div>
		<div class="row row-equal">
			<div class="col-xl-8">
				<div class="pa-box-insurance__box box-one h-100">
					<div class="row no-gutters">
						<div class="col-md-auto">
							<div class="pa-box-insurance__image">
								<?php								
									$image = wp_get_attachment_image_url($instance['box_one']['image'], 'insurance-thumb');
									$image_alt = get_post_meta($instance['box_one']['image'], '_wp_attachment_image_alt', TRUE);
								?>
								<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
							</div>
						</div>
						<div class="col">
							<div class="pa-box-insurance__data">
								<div class="title"><?php echo $instance['box_one']['title']; ?></div>
								<div class="content"><?php echo $instance['box_one']['content']; ?></div>
								<?php
									$url_1 = $instance['box_one']['url'];
									$link_target_1 = $instance['box_one']['url_target'];
								?>
								<a href="<?php echo sow_esc_url_raw( $url_1 ); ?>" target="<?php if ($link_target_1) echo '_blank'; else echo '_self'; ?>" class="btn btn-default btn-default--text-white"><span><?php _e("See how", "pa"); ?></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="pa-box-insurance__box box-two h-100">
					<div class="title"><?php echo $instance['box_two']['title']; ?></div>
					<div class="content"><?php echo $instance['box_two']['content']; ?></div>
					<?php
						$url_2 = $instance['box_two']['url'];
						$link_target_2 = $instance['box_two']['url_target'];
					?>
					<a href="<?php echo sow_esc_url_raw( $url_2 ); ?>" target="<?php if ($link_target_2) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php _e("See how", "pa"); ?></span></a>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="pa-box-insurance__box box-three h-100">
					<div class="title"><?php echo $instance['box_three']['title']; ?></div>
					<div class="content"><?php echo $instance['box_three']['content']; ?></div>
					<?php
						$url_3 = $instance['box_three']['url'];
						$link_target_3 = $instance['box_three']['url_target'];
					?>
					<a href="<?php echo sow_esc_url_raw( $url_3 ); ?>" target="<?php if ($link_target_3) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php _e("See how", "pa"); ?></span></a>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="pa-box-insurance__box box-four h-100">
					<div class="title"><?php echo $instance['box_four']['title']; ?></div>
					<div class="content"><?php echo $instance['box_four']['content']; ?></div>
					<?php
						$url_4 = $instance['box_four']['url'];
						$link_target_4 = $instance['box_four']['url_target'];
					?>
					<a href="<?php echo sow_esc_url_raw( $url_4 ); ?>" target="<?php if ($link_target_4) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php _e("See how", "pa"); ?></span></a>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="pa-box-insurance__box box-five h-100">
					<div class="title"><?php echo $instance['box_five']['title']; ?></div>
					<div class="content"><?php echo $instance['box_five']['content']; ?></div>
					<?php
						$url_5 = $instance['box_five']['url'];
						$link_target_5 = $instance['box_five']['url_target'];
					?>
					<a href="<?php echo sow_esc_url_raw( $url_5 ); ?>" target="<?php if ($link_target_5) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php _e("See how", "pa"); ?></span></a>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="pa-box-insurance__box box-six h-100">
					<div class="title"><?php echo $instance['box_six']['title']; ?></div>
					<div class="content"><?php echo $instance['box_six']['content']; ?></div>
					<?php
						$url_6 = $instance['box_six']['url'];
						$link_target_6 = $instance['box_six']['url_target'];
					?>
					<a href="<?php echo sow_esc_url_raw( $url_6 ); ?>" target="<?php if ($link_target_6) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php _e("See how", "pa"); ?></span></a>
				</div>
			</div>
			<div class="col-xl-8">
				<div class="pa-box-insurance__box box-seven h-100">
					<div class="row no-gutters">
						<div class="col-md-auto">
							<div class="pa-box-insurance__image">
								<?php								
									$image = wp_get_attachment_image_url($instance['box_seven']['image'], 'insurance-thumb');
									$image_alt = get_post_meta($instance['box_seven']['image'], '_wp_attachment_image_alt', TRUE);
								?>
								<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
							</div>
						</div>
						<div class="col">
							<div class="pa-box-insurance__data">
								<div class="title"><?php echo $instance['box_seven']['title']; ?></div>
								<div class="content"><?php echo $instance['box_seven']['content']; ?></div>
								<?php
									$url = $instance['box_seven']['url'];
									$link_target = $instance['box_seven']['url_target'];
								?>
								<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default btn-default--text-white"><span><?php _e("See how", "pa"); ?></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
