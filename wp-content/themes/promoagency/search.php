<?php
/* Template Name: Search */
?>
<?php get_header(); ?>

    <div class="pa-search-results">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php if ( have_posts() ) : ?>
                    
                    <?php while ( have_posts() ) : 
                            the_post();
                    ?>

                    <div class="pa-search-results__item">
                        <div class="pa-search-results__item__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <div class="pa-search-results__item__excerpt">
                            <?php $excerpt_event = get_field('event_short_text'); ?>
                            <?php $excerpt_press = the_excerpt(); ?>
                            <?php if($excerpt_event) { echo $excerpt_event; } else { echo $excerpt_press;} ?>
                        </div>
                    </div>

                    <?php endwhile; ?>

                    <?php else : ?>
                    
                    <div class="pa-search-results__empty">
                        <?php _e("No results found", "pa"); ?>
                    </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>