<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $background_image = wp_get_attachment_image_url($instance['widget_settings']['widget_bg_image'], 'full'); ?>
<?php $bg_section = $instance['widget_content']['checkbox']; ?>
<?php $li_underline = $instance['widget_content']['li_underline']; ?>
<?php $videoID = $instance['widget_content']['video_id']; ?>
<?php $videoTrigger = wp_get_attachment_image_url($instance['widget_content']['video_image'], 'full'); ?>

<div class="pa-txt-img-universal__background" <?php if( $background_image ) : ?>style="background-image:url(<?php echo $background_image; ?>)"<?php endif; ?>>
<section class="pa-txt-img-universal <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<?php foreach( $instance['ordering'] as $item ) { switch( $item ) { case 'left' : ?>
			<div class="col-lg-6 <?php if ($right === 'on') : echo 'order-1 order-lg-2'; endif; ?>">
				<div class="pa-txt-img-universal__wrapper h-100 <?php if( $bg_section ) { echo 'background'; } ?>">
					<div class="pa-txt-img-universal__header pa-header__mid">
						<div class="row">
							<div class="col">
								<?php echo $instance['widget_content']['header']; ?>
							</div>
						</div>
					</div>
					<div class="pa-txt-img-universal__content <?php if( $li_underline ) { echo 'li_nounderline'; } ?>">
						<div class="row">
							<div class="col">
								<?php echo $instance['widget_content']['content']; ?>
							</div>
						</div>
					</div>
					<?php								
						$url_name = $instance['widget_content']['url_name'];
						$url = $instance['widget_content']['url'];
						$link_target = $instance['widget_content']['url_target'];
						if ($url_name && $url) :
					?>
					<div class="pa-txt-img-universal__button">
						<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php echo $url_name; ?></span></a>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php break; case 'right' : $right = 'on' ;?>
			<div class="col-lg-6 <?php if ($right === 'on') : echo 'order-2 order-lg-1'; endif; ?>">
				<div class="pa-txt-img-universal__image">
					<?php
						$image = wp_get_attachment_image_url($instance['widget_content']['image'], 'slider-cs');
						$image_alt = get_post_meta($instance['widget_content']['image'], '_wp_attachment_image_alt', TRUE);
					?>
					<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					<?php if($videoID && $videoTrigger) : $i = rand(1, 100); ?>
						<div class="pa-txt-img-universal__video" data-toggle="modal" data-target="#videoModal-<?php echo $i; ?>">
							<img src="<?php echo $videoTrigger; ?>" alt="<?php _e("Play", "pa") ?>">
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php break; } } ?>
		</div>
	</div>
</section>
</div>

<!-- The Modal -->
<?php if($videoID && $videoTrigger): ?>
    <div class="modal fade videoModal universalModal" id="videoModal-<?php echo $i; ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <iframe width="100%" height="575" src="https://www.youtube.com/embed/<?php echo $videoID; ?>" allow="autoplay" width="100%" frameborder="0" height="100%" allowfullscreen></iframe>
                </div>                                        
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- The Modal END -->
