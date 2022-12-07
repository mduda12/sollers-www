<div class="pa-hero-new">
    <div class="pa-hero-new__scroll">
        <a href="#scroll" class="scroll-down"><div class="icon-scroll"></div></a>
    </div>
    <div class="pa-hero-new__slider">

        <?php if( have_rows('hero_slider_items') ): ?>
        <?php $i = 1; ?>

        <?php while( have_rows('hero_slider_items') ): the_row(); 

        $hero_background_type = get_sub_field('hero_background_type');
        $hero_background_image = get_sub_field('hero_background_image');
        $hero_background_video = get_sub_field('hero_background_video');
        $hero_header = get_sub_field('hero_header');
        $hero_subheader = get_sub_field('hero_subheader');
        $hero_desc = get_sub_field('hero_desc');
        $hero_tab_text = get_sub_field('hero_tab_text');
        $hero_link = get_sub_field('hero_link');

        ?>

        <?php if($hero_background_type == "image") { ?>

        <div class="pa-hero-new__slider__item" data-tab-name="<?php echo $hero_tab_text; ?>">
            <div class="pa-hero-new__content--wrap">
                <div class="pa-hero-new__image--wrapp">
                    <img src="<?php echo esc_url($hero_background_image['url']); ?>" class="pa-hero-bg" alt="Slide background">
                </div>
                <div class="pa-hero-new__svg__wrap">

                <svg version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 1080"
                    style="enable-background:new 0 0 1920 1080; bottom: 0; left: 0; height: 100%;" xml:space="preserve" class="hero-stripe hero-stripe__one">
                <polygon class="svg-stripe-one animated" data-delay="0.3s" data-animation="fadeInLeft" points="634.7,0 0,0 0,1080 1157.2,1080 "/>
                </svg>

                <svg version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 1080"
                    style="enable-background:new 0 0 1920 1080; bottom: 0; left: 0; height: 100%;" xml:space="preserve" class="hero-stripe hero-stripe__three">
                <polygon class="svg-stripe-three animated" data-animation="fadeInLeft" points="1239.34,1080.01 1157.26,1080.01 634.75,0 716.84,0.01 "/>
                </svg>

                </div>
                <div class="pa-hero-new__content">
                    <div class="pa-hero-new__all__content">
                        <div class="pa-hero-new__content__items">
                            <div class="pa-hero-new__content__bracket pa-hero-new__content__bracket--left animated" data-delay="1s" data-animation="zoomIn">
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/hero-left-bracket.png" alt="bracket">
                            </div>
                            <div class="pa-hero-new__slider__text">
                                <div class="pa-hero-new__slider__header animated" data-delay="1s" data-animation="fadeIn">
                                    <?php echo $hero_header; ?>
                                </div>
                                <div class="pa-hero-new__slider__subheader animated" data-delay="1.3s" data-animation="fadeIn">
                                    <?php echo $hero_subheader; ?>
                                </div>
                            </div>
                            <div class="pa-hero-new__content__bracket pa-hero-new__content__bracket--right animated" data-delay="1s" data-animation="zoomIn">
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/hero-right-bracket.png" alt="bracket">
                            </div>
                        </div>
                        <?php if($hero_desc) { ?>
                        <div class="pa-hero-new__content__desc animated" data-delay="2s" data-animation="fadeInUp">
                            <?php echo $hero_desc; ?>
                        </div>
                        <?php } ?>
                        <?php if($hero_link) {
                            $link_url = $hero_link['url'];
                            $link_title = $hero_link['title'];
                            $link_target = $hero_link['target'] ? $hero_link['target'] : '_self';
                        ?>
							<div class="pa-hero-new__content__button" data-delay="2.5s" data-animation="fadeInUp">
                                <a class="btn btn-full-white--border" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
							</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

        <?php if($hero_background_type == "video") { ?>
            
        <div class="pa-hero-new__slider__item" data-tab-name="<?php echo $hero_tab_text; ?>">
            <div class="pa-hero-new__content--wrap">
                <div class="pa-hero-video-item">
                    <div id="pa-iframe-video-<?php echo $i; ?>"></div>
                </div>
        
                <div class="pa-hero-new__svg__wrap">

                <svg version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 1080"
                    style="enable-background:new 0 0 1920 1080; bottom: 0; left: 0; height: 100%;" xml:space="preserve" class="hero-stripe hero-stripe__one">
                <polygon class="svg-stripe-one animated" data-animation="fadeInLeft" points="634.7,0 0,0 0,1080 1157.2,1080 "/>
                </svg>

                <svg version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 1080"
                    style="enable-background:new 0 0 1920 1080; bottom: 0; left: 0; height: 100%;" xml:space="preserve" class="hero-stripe hero-stripe__three">
                <polygon class="svg-stripe-three animated" data-delay="0.6s" data-animation="slideInUp" points="1239.34,1080.01 1157.26,1080.01 634.75,0 716.84,0.01 "/>
                </svg>

                </div>
                <div class="pa-hero-new__content">
                    <div class="pa-hero-new__all__content">
                        <div class="pa-hero-new__content__items">
                            <div class="pa-hero-new__content__bracket pa-hero-new__content__bracket--left animated" data-delay="1s" data-animation="zoomIn">
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/hero-left-bracket.png" alt="bracket">
                            </div>
                            <div class="pa-hero-new__slider__text">
                                <div class="pa-hero-new__slider__header animated" data-delay="1s" data-animation="fadeIn">
                                    <?php echo $hero_header; ?>
                                </div>
                                <div class="pa-hero-new__slider__subheader animated" data-delay="1.3s" data-animation="fadeIn">
                                    <?php echo $hero_subheader; ?>
                                </div>
                            </div>
                            <div class="pa-hero-new__content__bracket pa-hero-new__content__bracket--right animated" data-delay="1s" data-animation="zoomIn">
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/hero-right-bracket.png" alt="bracket">
                            </div>
                        </div>
                        <?php if($hero_desc) { ?>
                            <div class="pa-hero-new__content__desc animated" data-delay="2s" data-animation="fadeInUp">
                                <?php echo $hero_desc; ?>
                            </div>
                        <?php } ?>
                        <?php if($hero_link) {
                            $link_url = $hero_link['url'];
                            $link_title = $hero_link['title'];
                            $link_target = $hero_link['target'] ? $hero_link['target'] : '_self';
                        ?>
							<div class="pa-hero-new__content__button" data-delay="2.5s" data-animation="fadeInUp">
                                <a class="btn btn-full-white--border" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
							</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

        <?php $i++; ?>

        <?php endwhile; ?>

        <?php endif; ?>
    </div>

    <div class="hero-dots-wrap"></div>
</div>
<?php  
    $hero_mobile_image = get_field('hero_mobile_image');
    $hero_mobile_header = get_field('hero_mobile_header');
    $hero_mobile_subheader = get_field('hero_mobile_subheader');
    $hero_mobile_desc = get_field('hero_mobile_desc');
    $hero_mobile_link = get_field('hero_mobile_link');
?>
<div class="pa-hero__mobile" style="background-image: url(<?php echo esc_url($hero_mobile_image['url']); ?>);">
    <div class="pa-hero__mobile__content">
        <div class="pa-hero__mobile__header">
            <?php echo $hero_mobile_header; ?>
        </div>
        <div class="pa-hero__mobile__subheader">
            <?php echo $hero_mobile_subheader; ?>
        </div>
        <?php if($hero_mobile_desc) { ?>
        <div class="pa-hero__mobile__desc">
            <?php echo $hero_mobile_desc; ?>
        </div>
        <?php } ?>
        <?php if($hero_mobile_link) {
            $link_url = $hero_mobile_link['url'];
            $link_title = $hero_mobile_link['title'];
            $link_target = $hero_mobile_link['target'] ? $hero_mobile_link['target'] : '_self';
        ?>
            <div class="pa-hero__mobile__button">
                <a class="btn btn-full-white--border" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
            </div>
        <?php } ?>
    </div>
    <div class="pa-hero__mobile__scroll">
        <a href="#scroll" class="scroll-down"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/scroll-down.png" alt="scroll down"></a>
    </div>
</div>

<?php if( have_rows('hero_slider_items') ): $i = 1; $num = 1; ?>
    <script>             
        var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        <?php while( have_rows('hero_slider_items') ): the_row(); ?>
            <?php $hero_background_type = get_sub_field('hero_background_type'); if($hero_background_type == "video") { ?>
                var player<?php echo $num; ?>;
            <?php } ?>
        <?php $num++; endwhile; ?>
        
        function onYouTubeIframeAPIReady() {

        <?php while( have_rows('hero_slider_items') ): the_row();  ?>
        <?php $hero_background_type = get_sub_field('hero_background_type'); if($hero_background_type == "video") { $hero_background_video = get_sub_field('hero_background_video'); ?>
                    
            player<?php echo $i; ?> = new YT.Player('pa-iframe-video-<?php echo $i; ?>', {
                height: '100%',
                width: '100%',
                videoId: '<?php echo $hero_background_video; ?>',
                playerVars: {
                            'autoplay': 0,
                            'modestbranding': 1,
                            'controls': 0,
                            'showinfo': 0,
                            'loop': 1,
                            'playlist': '<?php echo $hero_background_video; ?>',
                            'rel': 0,
                },
                events: {
                            'onReady': onPlayerReady,
                }
            });
                    
        <?php } ?>
        <?php $i++; endwhile; ?>

            function onPlayerReady(event) {
                event.target.playVideo();
                event.target.mute();
                event.target.setPlaybackQuality('hd1080');
            }
        }

    </script>
<?php endif; ?>