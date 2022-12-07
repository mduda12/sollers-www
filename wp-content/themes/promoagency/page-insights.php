<?php
/* Template Name: Insights */
?>
<?php get_header(); ?>

<?php $top_bg = get_field('insights_background_image'); ?>
<section class="pa-content__header__container pa-content__header--desktop" style="background-image: url(<?php echo $top_bg['url']; ?>)">
	<div class="container">
		<div class="row">
			<div class="col">
                <?php 
                $insights_header_text = get_field('insights_header_text');
                $insights_subheader_text = get_field('insights_subheader_text');
                ?>
				<div class="pa-content__header__wrap">
					<div class="pa-content__header__text pa-header__big">
                        <?php echo $insights_header_text; ?>
						<?php if($insights_subheader_text) : ?>
							<div class="pa-content__subheader pa-subheader__big">
								<?php echo $insights_subheader_text; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $top_bg_mobile = get_field('insights_background_image_mobile'); ?>

<section class="pa-content__header__container pa-content__header--mobile" style="background-image: url(<?php echo $top_bg_mobile['url']; ?>)">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-content__header__wrap">
					<div class="pa-content__header__text pa-header__big">
						<?php echo $insights_header_text; ?>
						<?php if($insights_subheader_text) : ?>
							<div class="pa-content__subheader pa-subheader__big">
								<?php echo $insights_subheader_text; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="insights-filter-wrap">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="insights-filter-wrap__header__container">
					<div class="insights-filter-wrap__bracket insights-filter-wrap__bracket--left">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/img/insights-bracket-left.png" alt="bracket">
					</div>
					<div class="insights-filter-wrap__header pa-header__mid">
						<?php the_field('insights_filter_header'); ?>
					</div>
					<div class="insights-filter-wrap__bracket insights-filter-wrap__bracket--right">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/img/insights-bracket-right.png" alt="bracket">
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="container-1365 insights-filter-wrap__form">
		<div class="container">
			<div class="row">
				<div class="col">
					<?php
						if (ICL_LANGUAGE_CODE == "en") {
							echo do_shortcode( '[searchandfilter id="2901"]' );
						} elseif (ICL_LANGUAGE_CODE == "de") {
							echo do_shortcode( '[searchandfilter id="10083"]' );
						} elseif (ICL_LANGUAGE_CODE == "pl") {
							echo do_shortcode( '[searchandfilter id="10082"]' );
						} elseif (ICL_LANGUAGE_CODE == "ja") {
							echo do_shortcode( '[searchandfilter id="10084"]' );
						} elseif (ICL_LANGUAGE_CODE == "fr") {
						        echo do_shortcode('[searchandfilter id="2901"]');	
						}
					?>
				</div>
			</div>
		</div>
    </div>
</section>

<section class="insights-results-wrap">
	<?php
		if (ICL_LANGUAGE_CODE == "en") {
			echo do_shortcode( '[searchandfilter id="2901" show="results"]' );
		} elseif (ICL_LANGUAGE_CODE == "de") {
			echo do_shortcode( '[searchandfilter id="10083" show="results"]' );
		} elseif (ICL_LANGUAGE_CODE == "pl") {
			echo do_shortcode( '[searchandfilter id="10082" show="results"]' );
		} elseif (ICL_LANGUAGE_CODE == "ja") {
			echo do_shortcode( '[searchandfilter id="10084" show="results"]' );
		} elseif (ICL_LANGUAGE_CODE == "fr") {
		  	echo do_shortcode('[searchandfilter id="2901" show="results"]');
		}
	?>
</section>


<section class="pa-contact-one pa-background">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="pa-contact-one__form">
					<h2 class="header pa-header__big"><?php _e("Contact Us", "pa"); ?></h2>
                    <?php 
                        $link = get_field('insights_contact_btn');
                        $url = $link['url'];
                        $link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a href="<?php echo esc_url( $url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-default"><span><?php echo esc_html( $link_title ); ?></span></a>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa-contact-one__box box-one">
					<?php
						$image_one = get_field('insights_contact_one_image');
					?>
					<img class="box-image" src="<?php echo $image_one['sizes']['contact-one']; ?>" alt="<?php echo $image_one['alt']; ?>">
					<div class="pa-contact-one__wrapper">
						<div class="name"><?php the_field('insights_contact_one_name'); ?></div>
						<div class="position"><?php the_field('insights_contact_one_position'); ?></div>
						<div class="mail">
							<aside data-toggle="modal" data-target="#contactModal-1">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-mail.png" alt="">
								<?php the_field('insights_contact_one_cta'); ?>
							</aside>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="pa-contact-one__box box-two">
					<?php
						$image_two = get_field('insights_contact_two_image');
					?>
					<img class="box-image" src="<?php echo $image_two['sizes']['contact-one']; ?>" alt="<?php echo $image_two['alt']; ?>">
					<div class="pa-contact-one__wrapper">
						<div class="name"><?php the_field('insights_contact_two_name'); ?></div>
						<div class="position"><?php the_field('insights_contact_two_position'); ?></div>
						<div class="mail">
							<aside data-toggle="modal" data-target="#contactModal-2">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-mail.png" alt="">
								<?php the_field('insights_contact_two_cta'); ?>
							</aside>
						</div>
					</div>
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
				<?php the_field("insights_contact_title"); ?>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
				<?php the_field("insights_contact_one_form"); ?>
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
				<?php the_field("insights_contact_title"); ?>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
				<?php the_field("insights_contact_two_form"); ?>
            </div>                                        
        </div>
    </div>
</div>
<!-- The Modal 2 END -->



<?php get_footer(); ?>
