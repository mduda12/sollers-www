<?php $background = wp_get_attachment_image_url($instance['widget_content']['background'], 'full'); ?>
<section class="pa-bg-txt-btn" style="background-image:url(<?php echo $background; ?>)">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-bg-txt-btn__header pa-header__mid">
					<?php echo $instance['widget_content']['header']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-bg-txt-btn__content">
					<?php echo $instance['widget_content']['content']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
			<?php $button = $instance['widget_content']['modal_txt']; if($button) : $num = rand(1, 100) ?>
				<div class="pa-bg-txt-btn__btn">
					<div data-toggle="modal" data-target="#bannerModal-<?php echo $num; ?>" class="btn btn-full-white"><span><?php echo $button; ?></span></div>
				</div>
			</div>
			<?php endif ;?>
		</div>
	</div>
</section>

<?php $modal = $instance['widget_content']['modal_content']; if($modal) : ?>
<!-- The Modal -->
<div class="modal fade widgetModal" id="bannerModal-<?php echo $num; ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        	<!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
				<?php echo $modal; ?>
            </div>                                        
        </div>
    </div>
</div>
<!-- The Modal END -->
<?php endif ;?>