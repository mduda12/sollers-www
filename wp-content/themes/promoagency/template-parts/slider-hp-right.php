<?php if( have_rows('slider_right') ): ?>
<section class="slider-hp-right" id="scroll">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="slider-hp-right__wrapper">
                    <div class="slider-hp-right__nav">
                        <span class="navigation slider-prev hp-right-prev"></span><span class="navigation slider-next hp-right-next"></span>
                    </div>
                    <div class="slider-hp-right-init">
                        <?php $i = 1; while( have_rows('slider_right') ): the_row(); 
                            $image = get_sub_field('slider_right_photo');
                            $title = get_sub_field('slider_right_title');
                            $content = get_sub_field('slider_right_content');
                            $videoActive = get_sub_field('slider_right_video');
                        ?>
                            <article class="slider-hp-right__box">
                                <div class="row no-gutters">
                                    <div class="col-lg-6 order-2 order-lg-1">
                                        <div class="slider-hp-right__data">
                                            <span class="title"><?php echo $title; ?></span>
                                            <span class="content"><?php echo $content; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 order-1 order-lg-2">
                                        <div class="slider-hp-right__image">
                                            <img src="<?php echo $image['sizes']['slider-hp-right']; ?>" alt="<?php echo $image['alt'] ?>" />
                                            <?php if($videoActive === 'Yes'): ?>
                                                <div class="slider-hp-right__video" data-toggle="modal" data-target="#videoModal-<?php echo $i; ?>"></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php $i++; endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- The Modal -->
<?php if( have_rows('slider_right') ): ?>
    <?php $i = 1; while( have_rows('slider_right') ): the_row(); 
        $videoActive = get_sub_field('slider_right_video');
        $videoActiveID = get_sub_field('slider_right_video_youtube_id');
        if ( ($videoActive === "Yes") && $videoActiveID ) :
    ?>
        <div class="modal fade videoModal" id="videoModal-<?php echo $i; ?>">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <iframe width="100%" height="575" src="https://www.youtube.com/embed/<?php echo $videoActiveID; ?>?rel=0&autoplay=0&showinfo=0" allowfullscreen="" width="100%" frameborder="0" height="100%" allowfullscreen></iframe>
                    </div>                                        
                </div>
            </div>
        </div>
    <?php endif; $i++; endwhile; ?>
<?php endif; ?>
<!-- The Modal END -->