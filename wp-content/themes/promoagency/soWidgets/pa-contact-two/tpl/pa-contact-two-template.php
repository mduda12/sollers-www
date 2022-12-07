<section class="pa-contact-two <?php $background = ($instance['widget_settings']['widget_bg']); if($background) : echo 'pa-background'; endif; $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-contact-two__header">
					<h2 class="header pa-header__big"><?php _e("Contact Us", "pa"); ?></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="pa-contact-two__box box-one">
					<?php
						$image = wp_get_attachment_image_url($instance['person_1']['box_image'], 'contact-one');
						$image_alt = get_post_meta($instance['person_1']['box_image'], '_wp_attachment_image_alt', TRUE);
					?>
					<img class="box-image" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					<div class="pa-contact-two__wrapper">
						<div class="name"><?php echo $instance['person_1']['box_name']; ?></div>
						<div class="position"><?php echo $instance['person_1']['box_position']; ?></div>
						<div class="mail">
							<aside data-toggle="modal" data-target="#contactModal-1">
								<?php if ( $alternative ) : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-mail-violet.png" alt="">
								<?php else : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-mail.png" alt="">
								<?php endif ?>
								<?php echo $instance['person_1']['box_mail_description']; ?>
							</aside>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa-contact-two__box box-two">
					<?php
						$image = wp_get_attachment_image_url($instance['person_2']['box_image'], 'contact-one');
						$image_alt = get_post_meta($instance['person_2']['box_image'], '_wp_attachment_image_alt', TRUE);
					?>
					<img class="box-image" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					<div class="pa-contact-two__wrapper">
						<div class="name"><?php echo $instance['person_2']['box_name']; ?></div>
						<div class="position"><?php echo $instance['person_2']['box_position']; ?></div>
						<div class="mail">
							<aside data-toggle="modal" data-target="#contactModal-2">
								<?php if ( $alternative ) : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-mail-blue.png" alt="">
								<?php else : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-mail.png" alt="">
								<?php endif ?>
								<?php echo $instance['person_2']['box_mail_description']; ?>
							</aside>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa-contact-two__box box-three">
					<?php
						$image = wp_get_attachment_image_url($instance['person_3']['box_image'], 'contact-one');
						$image_alt = get_post_meta($instance['person_3']['box_image'], '_wp_attachment_image_alt', TRUE);
					?>
					<img class="box-image" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					<div class="pa-contact-two__wrapper">
						<div class="name"><?php echo $instance['person_3']['box_name']; ?></div>
						<div class="position"><?php echo $instance['person_3']['box_position']; ?></div>
						<div class="mail">
							<aside data-toggle="modal" data-target="#contactModal-3">
								<?php if ( $alternative ) : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-mail-blue.png" alt="">
								<?php else : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-mail.png" alt="">
								<?php endif ?>
								<?php echo $instance['person_3']['box_mail_description']; ?>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-contact-two__form">
					<?php 
						$url = $instance['url'];
						$link_target = $instance['url_target'];
					?>
					<?php if ( $alternative ) : ?>
						<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-violet"><span><?php _e("Send a message", "pa"); ?></span></a>
					<?php else : ?>
						<a href="<?php echo sow_esc_url_raw( $url ); ?>" target="<?php if ($link_target) echo '_blank'; else echo '_self'; ?>" class="btn btn-default"><span><?php _e("Send a message", "pa"); ?></span></a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- The Modal 1 -->
<div class="modal fade widgetModal" id="contactModal-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        	<!-- Modal Header -->
            <div class="modal-header">
				<?php echo $instance['widget_title']['title']; ?>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
				<?php echo $instance['person_1']['box_mail']; ?>
            </div>                                        
        </div>
    </div>
</div>
<!-- The Modal 1 END -->
<!-- The Modal 2 -->
<div class="modal fade widgetModal" id="contactModal-2">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        	<!-- Modal Header -->
            <div class="modal-header">
				<?php echo $instance['widget_title']['title']; ?>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
				<?php echo $instance['person_2']['box_mail']; ?>
            </div>                                        
        </div>
    </div>
</div>
<!-- The Modal 2 END -->
<!-- The Modal 3 -->
<div class="modal fade widgetModal" id="contactModal-3">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        	<!-- Modal Header -->
            <div class="modal-header">
				<?php echo $instance['widget_title']['title']; ?>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
				<?php echo $instance['person_3']['box_mail']; ?>
            </div>                                        
        </div>
    </div>
</div>
<!-- The Modal 3 END -->
