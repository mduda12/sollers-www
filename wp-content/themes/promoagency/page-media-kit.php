<?php
/* Template Name: Media room: Media kit */
?>
<?php get_header(); ?>

<!-- PAGE TOP -->
<?php $top_bg = get_field('media_background_image'); ?>
<section class="pa-content__header__container pa-content__header--desktop" style="background-image: url(<?php if( !empty( $top_bg ) ): echo $top_bg; endif; ?>)">
	<div class="container">
		<div class="row">
			<div class="col">
                <?php 
                $media_header_text = get_field('media_header_text');
                $media_subheader_text = get_field('media_subheader_text');
                ?>
				<div class="pa-content__header__wrap">
					<div class="pa-content__header__text pa-header__big">
                        <?php echo $media_header_text; ?>
						<?php if($media_subheader_text) : ?>
							<div class="pa-content__subheader pa-subheader__big">
								<?php echo $media_subheader_text; ?>
							</div>
                        <?php endif; ?>
                        <?php $link = get_field('media_button');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
							<div class="pa-content__button">
                                <a class="btn btn-full-white--border" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $top_bg_mobile = get_field('media_background_image_mobile'); ?>
<section class="pa-content__header__container pa-content__header--mobile" style="background-image: url(<?php if( !empty( $top_bg_mobile ) ): echo $top_bg_mobile; endif; ?>)">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-content__header__wrap">
					<div class="pa-content__header__text pa-header__big">
						<?php echo $media_header_text; ?>
						<?php if($media_subheader_text) : ?>
							<div class="pa-content__subheader pa-subheader__big">
								<?php echo $media_subheader_text; ?>
							</div>
                        <?php endif; ?>
                        <?php if($link) : ?>
							<div class="pa-content__button">
                                <a class="btn btn-full-white--border" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="press-room-bookmarks">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="press-room-bookmarks__items">
					<?php wp_nav_menu( array( 'menu' => 'Press Room Bookmarks' ) ); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MEDIA KIT -->
<section class="pa-media-kit">
<div class="container">
	<div class="row">
		<div class="col">
			<div class="pa-media-kit__header pa-header__mid">
				<?php the_field("media_kit_header"); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php if( have_rows('media_kit_materials') ): ?>
				<div id="media-kit" class="pa-media-kit__wrapper">
					<?php $i=1; while( have_rows('media_kit_materials') ): the_row(); 
						$title = get_sub_field('media_kit_title');
						$allItem = get_sub_field('media_kit_all_item');
					?>
						<div class="pa-media-kit__item">
							<div id="heading-<?php echo $i; ?>" class="title <?php if ($i == 1): echo 'active'; endif; ?>" data-toggle="collapse" data-target="#collapse-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $i; ?>">
								<?php echo $title; ?> <span class="info"><?php _e("close", "pa"); ?></span> <span class="arrow <?php if ($i == 1): echo 'active'; endif; ?>"></span>
							</div>		
							<div id="collapse-<?php echo $i; ?>" class="collapse <?php if ($i == 1): echo 'show'; endif; ?>" aria-labelledby="heading-1" data-parent="#media-kit">
							<?php if( have_rows('media_kit_item') ): ?>
								<div class="row justify-content-center">
									<?php while( have_rows('media_kit_item') ): the_row(); 
										$image = get_sub_field('media_kit_item_image');
										$titleBox = get_sub_field('media_kit_item_title');
										$link = get_sub_field('media_kit_item_link');
									?>
										<div class="col-sm-6 col-lg-4">
											<div class="pa-media-kit__box">
												<div class="image">
												<?php if( !empty( $image ) ): ?>
													<img src="<?php echo esc_url($image['sizes']['media-kit']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
												<?php else: ?>
													<img src="<?php echo get_template_directory_uri(); ?>/dist/img/media-default-thumbnail.jpg" alt="<?php _e("Media", "pa"); ?>" />
												<?php endif; ?>
												</div>
												<div class="data">
													<header><?php echo $titleBox; ?></header>
													<?php 
													if( $link ): 
														$link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';
													?>
													<a class="btn btn-default" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
													<?php endif; ?>
												</div>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
							<?php 
								if( $allItem): 
								$link_url = $allItem['url'];
								$link_title = $allItem['title'];
								$link_target = $allItem['target'] ? $allItem['target'] : '_self';
							?>
							<div class="row justify-content-end">
								<div class="col-lg-4">
									<div class="pa-media-kit__link">
										<a class="btn btn-gray" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
									</div>
								</div>
							</div>
							<?php endif; ?>
							</div>
						</div>
					<?php $i++; endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
</section>

<!-- LINKEDIN -->
<?php $visibility = get_field("media_linkedin_status"); if($visibility) :  ?>
<section class="pa-media-linkedin">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-media-linkedin__header pa-header__mid">
					<?php the_field("page_media_linkedin_header", "options"); ?>
				</div>
			</div>
		</div>
		<?php $news_one = get_field("page_media_news_one", "options"); $news_two = get_field("page_media_news_two", "options"); ?>
		<div class="row">
			<?php if($news_one) : ?>
			<div class="col-sm-6">
				<iframe src="https://www.linkedin.com/embed/feed/update/urn:li:share:<?php echo $news_one; ?>" height="650" width="100%" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>
			</div>
			<?php endif; ?>
			<?php if($news_two) : ?>
			<div class="col-sm-6">
				<iframe src="https://www.linkedin.com/embed/feed/update/urn:li:share:<?php echo $news_two; ?>" height="650" width="100%" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?> 

<!-- CONTACT US -->
<section class="pa-media-contact">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-media-contact__header">
					<h2 class="header pa-header__big"><?php the_field("media_contact_header"); ?></h2>
				</div>
			</div>
        </div>
		<?php if( have_rows('media_contact_person') ): $numrows = count( get_field( 'media_contact_person' ) ); ?>
		<div class="row">
            <?php $i= 1; while( have_rows('media_contact_person') ): the_row(); 
				$imagePerson = get_sub_field('media_contact_person_image');
                $name = get_sub_field('media_contact_person_name');
                $position = get_sub_field('media_contact_person_position');
                $link_text = get_sub_field('media_contact_person_link_text');
                $form = get_sub_field('media_contact_person_embed_form');
            ?>
			<div class="<?php if( $numrows === 1 ): echo "col"; elseif( $numrows === 2 ): echo "col-sm-6"; elseif( $numrows === 3 ): echo "col-sm-6 col-lg-4"; elseif( $numrows === 4 ): echo "col-sm-6 col-lg-3"; endif; ?>">
				<div class="pa-media-contact__box h-100">
                    <?php if( !empty( $imagePerson ) ): ?>
						<div class="pa-media-contact__image">
						<?php if( $numrows === 1 ): ?>
                        	<img class="box-image" src="<?php echo $imagePerson['url']; ?>" alt="<?php echo $imagePerson['alt']; ?>" />
						<?php elseif( $numrows === 2 || $numrows === 3 || $numrows === 4): ?>
                        	<img class="box-image" src="<?php echo $imagePerson['sizes']['slider-cs']; ?>" alt="<?php echo $imagePerson['alt']; ?>" />
						<?php endif; ?>
                    </div>
                    <?php endif; ?>
					<div class="pa-media-contact__wrapper">
                        <div class="pa-media-contact__data">
                            <div class="name"><?php echo $name; ?></div>
                            <div class="position"><?php echo $position; ?></div>
                        </div>
						<div class="mail">
							<aside data-toggle="modal" data-target="#contactModal-<?php echo $i; ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-mail.png" alt="<?php _e("Icon", "pa"); ?>">
								<?php echo $link_text; ?>
							</aside>
						</div>
					</div>
				</div>
            </div>
            <?php $i++; endwhile; ?>
        </div>
        <?php endif; ?>
		<div class="row">
			<div class="col">
				<div class="pa-media-contact__form">
                    <?php $link = get_field('media_contact_btn');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
						<a class="btn btn-default" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
	<!-- The Modal -->
	<?php if( have_rows('media_contact_person') ): ?>
		<?php $i = 1; while( have_rows('media_contact_person') ): the_row(); 
			$form= get_sub_field('media_contact_person_embed_form');
			if ( $form ) :
		?>
			<div class="modal fade widgetModal" id="contactModal-<?php echo $i; ?>">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<?php the_field("media_contact_header"); ?>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<!-- Modal body -->
						<div class="modal-body">
							<?php echo $form; ?>
						</div>                                        
					</div>
				</div>
			</div>
		<?php endif; $i++; endwhile; ?>
	<?php endif; ?>
	<!-- The Modal END -->
</section>

<!-- BANNER -->
<?php $banner_bg = get_field("media_banner_background"); ?>
<?php if( have_rows('media_banner_item') ): ?>
<section class="pa-media-banner" style="background-image: url(<?php if( !empty( $banner_bg ) ): echo $banner_bg; endif; ?>)">
	<div class="container">
		<div class="row">
            <?php $i= 1; while( have_rows('media_banner_item') ): the_row(); 
                $header = get_sub_field('media_banner_item_header');
                $content = get_sub_field('media_banner_item_content');
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="pa-media-banner__item pa-media-banner__item--<?php echo $i; ?>">
                    <div class="pa-media-banner__item__container">
                        <div class="pa-media-banner__item__header">
                            <?php echo $header; ?>
                        </div>
                        <div class="pa-media-banner__item__text">
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>