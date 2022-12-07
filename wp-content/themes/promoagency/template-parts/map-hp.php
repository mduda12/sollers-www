<section class="map-hp">
    <div class="map-hp__numbers pa-number-counter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="map-hp__slogan pa-widget__header pa-header__big">
                        <?php the_field("map_header"); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="map-hp__number__item map-hp__number__item--1">
                        <div class="map-hp__number__container">
                            <div class="map-hp__number__wrap">
                                <div class="map-hp__number__value number-counter-value" data-count="<?php the_field("column_one_number"); ?>">
                                    0
                                </div><span class="map-hp__number__icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/map-icon-one.png"></span>
                            </div>
                            <div class="map-hp__number__text">
                                <?php the_field("column_one_text"); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="map-hp__number__item map-hp__number__item--2">
                        <div class="map-hp__number__container">
                            <div class="map-hp__number__wrap">
                                <div class="map-hp__number__value number-counter-value" data-count="<?php the_field("column_two_number"); ?>">
                                    0
                                </div><span class="map-hp__number__icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/map-icon-two.png"></span>
                            </div>
                            <div class="map-hp__number__text">
                                <?php the_field("column_two_text"); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="map-hp__number__item map-hp__number__item--3">
                        <div class="map-hp__number__container">
                            <div class="map-hp__number__wrap">
                                <div class="map-hp__number__value number-counter-value" data-count="<?php the_field("column_three_number"); ?>">
                                    0
                                </div><span class="map-hp__number__icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/map-icon-three.png"></span>
                            </div>
                            <div class="map-hp__number__text">
                                <?php the_field("column_three_text"); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="map-hp__number__item map-hp__number__item--4">
                        <div class="map-hp__number__container">
                            <div class="map-hp__number__wrap">
                                <div class="map-hp__number__value number-counter-value" data-count="<?php the_field("column_four_number"); ?>">
                                    0
                                </div><span class="map-hp__number__icon"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/map-icon-four.png"></span>
                            </div>
                            <div class="map-hp__number__text">
                                <?php the_field("column_four_text"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-hp__wrapp">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="map-hp__item">
                        <div class="map-hp__item__map">
                            <?php get_template_part('template-parts/map-hp-svg'); ?>
                        </div>
                        <div class="map-hp__item__map--mobile">
                            <?php $mobile_map_image = get_field('mobile_map_image');?>
                            <img src="<?php echo $mobile_map_image['url']; ?>" alt="<?php echo $mobile_map_image['alt']; ?>" class="img-fluid">
                        </div>
                        <div class="map-hp__markets">
                            <span class="map-hp__markets--strategic">
                                <?php the_field("strategic_markets_label"); ?>
                            </span>
                            <span class="map-hp__markets--operate">
                                <?php the_field("operate_markets_label"); ?>
                            </span>
                        </div>
                        <div class="map-hp__cta">
                        <?php 
                            $link = get_field('map_button');
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-default"><span><?php echo esc_html( $link_title ); ?></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>