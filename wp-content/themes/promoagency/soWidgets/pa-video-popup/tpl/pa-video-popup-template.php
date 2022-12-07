<?php $background = wp_get_attachment_image_url($instance['widget_content']['background'], 'full'); ?>
<section class="pa-video-popup" style="background-image:url(<?php echo $background; ?>)">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-video-popup__header pa-header__mid">
					<?php echo $instance['widget_content']['header']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-video-popup__content">
					<?php echo $instance['widget_content']['content']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php								
					$video = $instance['widget_content']['video'];
					$videoTrigger = $instance['widget_content']['video_switch'];
					if ($video && $videoTrigger) :
					$i = rand(1, 100)
				?>
				<div class="pa-video-popup__btn" data-toggle="modal" data-target="#videoModal-<?php echo $i; ?>">
					<?php echo $videoTrigger; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<!-- The Modal -->
<?php if($video && $videoTrigger): ?>
        <div class="modal fade videoModal" id="videoModal-<?php echo $i; ?>">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <iframe width="100%" height="575" src="https://www.youtube.com/embed/<?php echo $video; ?>?rel=0&autoplay=0&showinfo=0" allowfullscreen="" width="100%" frameborder="0" height="100%" allowfullscreen></iframe>
                    </div>                                        
                </div>
            </div>
        </div>
<?php endif; ?>
<!-- The Modal END -->