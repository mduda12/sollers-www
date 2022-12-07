<?php $top_bg = wp_get_attachment_image_url($instance['pt_one_background'], 'full'); ?>
<section class="pa-content__header__container pa-content__header--desktop" style="background-image: url(<?php echo $top_bg; ?>)">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-content__header__wrap">
					<div class="pa-content__header__text pa-header__big <?php $rife = $instance['pt_one_rife']; if($rife) : echo 'rife' ; endif; ?>">
						<?php echo $instance['pt_one_header']; ?>
						<?php $subheader = $instance['pt_one_subheader']; if($subheader) : ?>
							<div class="pa-content__subheader pa-subheader__big">
								<?php echo $subheader; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $top_bg_mobile = (($instance['pt_one_background_mobile']) ? wp_get_attachment_image_url($instance['pt_one_background_mobile'], 'full') : get_template_directory_uri() . "/dist/img/top_bg_mobile.jpg") ?>

<section class="pa-content__header__container pa-content__header--mobile" style="background-image: url(<?php echo $top_bg_mobile; ?>)">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-content__header__wrap">
					<div class="pa-content__header__text pa-header__big <?php $rife = $instance['pt_one_rife']; if($rife) : echo 'rife' ; endif; ?>">
						<?php echo $instance['pt_one_header']; ?>
						<?php $subheader = $instance['pt_one_subheader']; if($subheader) : ?>
							<div class="pa-content__subheader pa-subheader__big">
								<?php echo $subheader; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>