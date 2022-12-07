<section class="slider-tmi homepage">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="slider-tmi__header">
                    <h2 class="header homepage padding-v75"><?php the_field("slider-tmi_header"); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="slider-tmi__wrapper">
                    <div class="slider-tmi__nav">
                        <span class="navigation slider-prev tmi-prev"></span><span class="navigation slider-next tmi-next"></span>
                    </div>

                    <div class="pa-slider-tmi-init slider-tmi-init">

                    <?php 

                    $insights_list = get_field('slider_tmi_insights_list');             

                    $queryargs = array(
                        'post_type'              => array( 'insights' ),
                        'post_status'            => array( 'publish' ),
                        'order'                  => 'DSC',
                        'orderby'				 => 'post__in',
                        'post__in'               => $insights_list
                    );

                    $insights = new WP_Query( $queryargs );

                    if ( $insights->have_posts() ) {
                        while ( $insights->have_posts() ) {
                            $insights->the_post();
                    ?>
                        
                        <article class="pa-slider-tmi__box slider-tmi__box">
                                
                        <?php

                        $taxIds = get_the_ID();
                        $taxIdsNum = get_the_terms( $taxIds, 'types' );
                        $taxIdsNumOne = $taxIdsNum[0];
                        $taxIdsNumOneObj = $taxIdsNumOne->term_taxonomy_id;

                        $image = get_field('insights_type_default_thumbnail', 'types_' . $taxIdsNumOneObj);


                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('insights-thumb', ['class' => 'img-fluid']);
                        } elseif($image) { ?>
                            <img src="<?php echo $image['url']; ?>" alt="insights" class="img-fluid">
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/insights-default-thumbnail.png" alt="thumbnail">
                        <?php }
                        ?>

                            <div class="pa-slider-tmi__data data slider-tmi__data data">
                                <span class="category">
                                
                                <?php

                                    $postIds = get_the_ID();

                                    $term_obj_list = get_the_terms( $postIds, 'post_tag' );

                                    if($term_obj_list) {
                                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                                        echo $terms_string;
                                    }

                                ?>
                            
                                </span>
                                <span class="title">
                                <?php 
                                    $insights_title = the_title();
                                    echo trim_text($insights_title, "...", 85 );  
                                ?>
                                </span>
                                
                                <div class="pa-slider-tmi__data--hover hover slider-tmi__data--hover hover">
                                    <span class="intro">

                                        <?php 
                                        $insights_slider_excerpt = get_field('insights_slider_excerpt');
                                        echo trim_text($insights_slider_excerpt, "...", 135 );  
                                        ?>

                                    </span>
                                    <a href="<?php the_permalink(); ?>" target="_self" class="btn btn-default"><span><?php _e("Read more", "pa"); ?></span></a>
                                </div>
                            </div>
                        </article>

                    <?php } }

                    // Restore original Post Data
                    wp_reset_postdata();

                    ?>

                    </div>

                    <div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>