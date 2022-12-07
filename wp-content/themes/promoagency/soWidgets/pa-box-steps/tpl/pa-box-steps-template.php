
<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-box-steps <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-box-steps__header">
					<h2 class="header pa-header__mid"><?php echo ($instance['widget_text']['text_header']) ?></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-box-steps__subheader">
					<?php echo ($instance['widget_text']['text_subheader']) ?>
				</div>
			</div>
		</div>
		<div class="row row-equal">
			<div class="col-sm-6 col-lg-3">
				<div class="pa-box-steps__box box-one h-100">
					<div class="title"><?php echo ($instance['box_one']['title']) ?></div>
					<div class="content"><?php echo ($instance['box_one']['box']) ?></div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-3">
				<div class="pa-box-steps__box box-two h-100">
					<div class="title"><?php echo ($instance['box_two']['title']) ?></div>
					<div class="content"><?php echo ($instance['box_two']['box']) ?></div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-3">
				<div class="pa-box-steps__box box-three h-100">
					<div class="title"><?php echo ($instance['box_three']['title']) ?></div>
					<div class="content"><?php echo ($instance['box_three']['box']) ?></div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-3">
				<div class="pa-box-steps__box box-four h-100">
					<div class="title"><?php echo ($instance['box_four']['title']) ?></div>
					<div class="content"><?php echo ($instance['box_four']['box']) ?></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-box-steps__footer">
					<?php echo ($instance['widget_text']['text_bottom']) ?>
				</div>
			</div>
		</div>
	</div>
</section>
