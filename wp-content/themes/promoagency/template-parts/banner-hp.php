<section class="banner-hp" style="background-image:url('<?php $bannerBG = get_field('banner_hp_bg'); echo $bannerBG['url']?>')">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="banner-hp__title">
                    <?php the_field("banner_hp_title"); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="banner-hp__subtitle">
                    <?php the_field("banner_hp_subtitle"); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                    $button_2 = get_field("banner_hp_button_2");
                    $button_2_target = $button_2['target'] ? $button_2['target'] : '_self';
                ?>
                <div class="banner-hp__links">
                    <a href="<?php echo $button_2['url'] ?>" target="<?php echo esc_attr( $button_2_target ); ?>" class="btn btn-full-white--border"><span><?php echo $button_2['title'] ?></span></a>    
                </div>
            </div>
        </div>
    </div>
</section>