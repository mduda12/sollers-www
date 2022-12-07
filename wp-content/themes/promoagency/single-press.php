<?php
/**
 *
 * Template for displaying custom post type - Press releases
 *
 */
?>

<?php get_header(); ?>

<?php 

$date_visibility = get_field('press_date_visibility');
$sidebar_visibility = get_field('press_sidebar_visibility');
$linkedin_button = get_field('press_linkedin_button');

?>

<section class="pa-content__header__container press-single__top">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-content__header__wrap">
					<div class="pa-content__header__text pa-header__big">
                        <?php echo the_title(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="press-single__content">
    <div class="container">
        <div class="row">
            <div class="<?php if($sidebar_visibility) { echo 'col-lg-8';} else { echo 'col'; } ?>">
                <div class="press-single__left">
                    <div class="press-single__left__top">
                        <div class="press-single__left__top--cat">
                            <?php if(!$date_visibility) { ?>
                            <span class="date">
                                <?php the_time( 'M d, Y' ); ?>
                            </span>
                            <?php } ?>
                        </div>
                        <?php if($linkedin_button) { ?>
                        <div class="press-single__left__top--share">
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=content" target="_blank" rel="noopener noreferrer" title="<?php _e("Share on LinkedIn", "pa"); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/linkedin-share.png" alt="linkedin sharing button">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <div>
                        <?php 
                        $author = get_field('press_single_author_name'); 
                        $author_add_form = get_field('press_single_add_form'); 
                        $author_form = get_field('press_single_form');
                        ?>
                        <?php if($author) { ?>
                        <div class="press-single__left__top--author">
                        <?php _e("By", "pa"); ?> <span class="author-name"><?php if($author_add_form == 'yes') { ?><a href="#" data-toggle="modal" data-target="#pressModalSingle-<?php echo $postIds; ?>"><?php } ?><?php echo $author; ?><?php if($author_add_form == 'yes') { ?></a><?php } ?></span>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="press-single__left__content">
                        <?php 
                        $lead_image = get_field('press_single_main_photo'); 
                        ?>
                        <?php if($lead_image) { ?>
                        <div class="press-single__left__content--image">
                            <img src="<?php echo $lead_image['sizes']['press-single']; ?>" alt="<?php echo $lead_image['alt']; ?>" class="img-fluid">
                        </div>
                        <?php } ?>
                        <div class="press-single__left__content--text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($sidebar_visibility) { ?>
            <div class="col-lg-4">
                <div class="press-single__right">

                    <!-- sidebar video -->

                    <?php if( have_rows('press_single_video') ): ?>

                        <div class="press-single__right__video">

                        <?php
                        while ( have_rows('press_single_video') ) : the_row();
                        
                        $press_single_video_header = get_sub_field('press_single_video_header');
                        $press_single_video_item = get_sub_field('press_single_video_item'); 
                        ?>

                        <div class="press-single__right__video__wrap">
                            <?php if($press_single_video_header) { ?>
                            <div class="press-single__right__video__header">
                                <?php echo $press_single_video_header; ?>
                            </div>
                            <?php } ?>

                            <?php if($press_single_video_item) { ?>
                            <div class="press-single__right__video__item">
                                <?php echo $press_single_video_item; ?>
                            </div>
                            <?php } ?>
                        </div>
                
                        <?php endwhile; ?>
                        </div>
                        <?php endif; ?>

                    <!-- sidebar redirects buttons -->

                    
                    <?php if( have_rows('press_single_redirect_button') ): ?>

                    <div class="press-single__right__redirect">

                    <?php
                    while ( have_rows('press_single_redirect_button') ) : the_row();
                    
                    $press_single_redirect_button_header = get_sub_field('press_single_redirect_button_header');
                    $press_single_redirect_button_item = get_sub_field('press_single_redirect_button_item'); 
                    ?>

                    <div class="press-single__right__redirect__item">
                        <?php if($press_single_redirect_button_header) { ?>
                        <div class="press-single__right__redirect__header">
                            <?php echo $press_single_redirect_button_header; ?>
                        </div>
                        <?php } ?>

                        <?php if($press_single_redirect_button_item) { 
                            $button_url = $press_single_redirect_button_item['url'];
                            $button_title = $press_single_redirect_button_item['title'];
                            $button_target = $press_single_redirect_button_item['target'] ? $press_single_redirect_button_item['target'] : '_self';
                        ?>
                        <div class="press-single__right__redirect__button">
                        <a class="btn btn-full-green" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><span><?php echo esc_html( $button_title ); ?></span></a>
                        </div>
                        <?php } ?>
                    </div>

                    

                    <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                
                    


                    <!-- sidebar downloads buttons -->

                    
                    <?php if( have_rows('press_single_download_button') ): ?>

                    <div class="press-single__right__downloads">

                    <?php
                    while ( have_rows('press_single_download_button') ) : the_row();
                    
                    $press_single_redirect_button_header = get_sub_field('press_single_redirect_button_header');
                    $press_single_redirect_button_file = get_sub_field('press_single_redirect_button_file'); 
                    $press_single_redirect_button_text = get_sub_field('press_single_redirect_button_text'); 
                    ?>
                    
                    <div class="press-single__right__download__item">
                        <?php if($press_single_redirect_button_header) { ?>
                        <div class="press-single__right__redirect__header">
                            <?php echo $press_single_redirect_button_header; ?>
                        </div>
                        <?php } ?>

                        <?php if($press_single_redirect_button_file) { 
                            $button_url = $press_single_redirect_button_file['url'];
                        ?>
                        <div class="press-single__right__redirect__button">
                        <a class="btn btn-full-green" href="<?php echo esc_url( $button_url ); ?>" target="_blank"><span><?php echo $press_single_redirect_button_text; ?></span></a>
                        </div>
                        <?php } ?>
                    </div>

                    <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                
                    


                    <?php 
                        $press_single_sidebar_form_header = get_field('press_single_sidebar_form_header'); 
                    ?>
                    <?php if($press_single_sidebar_form_header) { ?>
                    <div class="press-single__right__form--header">
                        <?php echo $press_single_sidebar_form_header; ?>
                    </div>
                    <?php } ?>


                    <?php 
                        $press_single_sidebar_form_code = get_field('press_single_sidebar_form_code'); 
                    ?>
                    <?php if($press_single_sidebar_form_code) { ?>
                    <div class="press-single__right__form">
                        <?php echo $press_single_sidebar_form_code; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php if($author_add_form == 'yes') { ?>
<!-- The Modal -->
<div class="modal fade widgetModal" id="pressModalSingle-<?php echo $postIds; ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        	<!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
				<br><br><br><br>
				<?php the_field('press_single_form'); ?>
				<br><br><br><br><br>
            </div>                                        
        </div>
    </div>
</div>
<!-- The Modal END -->
<?php } ?>


<?php get_footer(); ?>