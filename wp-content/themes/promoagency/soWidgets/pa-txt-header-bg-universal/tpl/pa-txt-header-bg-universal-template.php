<?php $background = $instance['widget_settings']['widget_bg']; ?>
<?php $bg_section = $instance['widget_content']['background']; ?>
<section class="pa-txt-header-bg-universal  <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
<div class="pa-txt-header-bg-universal__wrapper <?php if( $bg_section === 'one' ) : echo 'background'; elseif($bg_section === 'two' ) : echo 'background-alternative'; endif; ?>">	
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-txt-header-bg-universal__header pa-header__mid">
					<?php echo $instance['widget_content']['header']; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-txt-header-bg-universal__content">
					<?php echo $instance['widget_content']['content']; ?>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
