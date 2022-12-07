<?php if( have_rows('slider_left') ): ?>
<section class="slider-hp-left">
    <div class="container container-1400">
        <div class="row">
            <div class="col">
                <div class="slider-hp-left__wrapper">
                    <div class="slider-hp-left__nav">
                        <span class="navigation slider-prev hp-left-prev"></span><span class="navigation slider-next hp-left-next"></span>
                    </div>
                    <div class="slider-hp-left-init">
                        <?php while( have_rows('slider_left') ): the_row(); 
                            $image = get_sub_field('slider_left_photo');
                            $title = get_sub_field('slider_left_title');
                            $content = get_sub_field('slider_left_content');
                            $link = get_sub_field('slider_left_link');
                        ?>
                            <article class="slider-hp-left__box">
                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <div class="slider-hp-left__image">
                                            <img src="<?php echo $image['sizes']['slider-hp-left']; ?>" alt="<?php echo $image['alt'] ?>" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="slider-hp-left__data">
                                            <span class="title"><?php echo $title; ?></span>
                                            <span class="content"><?php echo $content; ?></span>
                                            <?php if ( $link ) : ?>
                                                <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>" class="btn btn-default"><span><?php echo  $link['title']; ?></span></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>