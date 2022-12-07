<footer>
    <div id="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-auto">
                    <div id="site-footer-logo">
                        <?php $logo = get_field('website_logo', 'option'); if($logo) : ?>
                        <a href="<?php echo get_home_url(); ?>"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt'] ?>" /></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php 
                    $col_heading_1 = get_field('column_heading_1', 'option'); 
                    $col_heading_2 = get_field('column_heading_2', 'option'); 
                    $col_heading_3 = get_field('column_heading_3', 'option'); 
                    $col_heading_4 = get_field('column_heading_4', 'option'); 
                    $col_heading_5 = get_field('column_heading_5', 'option'); 
                    $col_heading_6 = get_field('column_heading_6', 'option'); 
                    $col_heading_7 = get_field('column_heading_7', 'option'); 
                    $col_heading_8 = get_field('column_heading_8', 'option'); 
                    $col_heading_1_link = get_field('column_heading_1_link', 'option'); 
                    $col_heading_2_link = get_field('column_heading_2_link', 'option'); 
                    $col_heading_3_link = get_field('column_heading_3_link', 'option'); 
                    $col_heading_4_link = get_field('column_heading_4_link', 'option'); 
                    $col_heading_5_link = get_field('column_heading_5_link', 'option'); 
                    $col_heading_6_link = get_field('column_heading_6_link', 'option'); 
                    $col_heading_7_link = get_field('column_heading_7_link', 'option'); 
                    $col_heading_8_link = get_field('column_heading_8_link', 'option'); 
                ?>
                <?php if ( has_nav_menu( 'footer-menu-1' ) || $col_heading_1 ) : ?>
                    <div class="col-sm-auto">
                        <header>
                            <?php if($col_heading_1_link) : ?><a href="<?php echo $col_heading_1_link; ?>"><?php endif; ?>
                            <?php echo $col_heading_1; ?>
                            <?php if($col_heading_1_link) : ?></a><?php endif; ?>
                        </header>
                        <?php if ( has_nav_menu( 'footer-menu-1' ) ) : wp_nav_menu( array( 'theme_location' =>   'footer-menu-1' ) ); endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ( has_nav_menu( 'footer-menu-2' ) || $col_heading_2 ) : ?>
                    <div class="col-sm-auto">
                        <header>
                            <?php if($col_heading_2_link) : ?><a href="<?php echo $col_heading_2_link; ?>"><?php endif; ?>
                            <?php echo $col_heading_2; ?>
                            <?php if($col_heading_2_link) : ?></a><?php endif; ?>
                        </header>
                        <?php if ( has_nav_menu( 'footer-menu-2' ) ) : wp_nav_menu( array( 'theme_location' =>   'footer-menu-2' ) ); endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ( has_nav_menu( 'footer-menu-3' ) || $col_heading_3 ) : ?>
                    <div class="col-sm-auto">
                        <header>
                            <?php if($col_heading_3_link) : ?><a href="<?php echo $col_heading_3_link; ?>"><?php endif; ?>
                            <?php echo $col_heading_3; ?>
                            <?php if($col_heading_3_link) : ?></a><?php endif; ?>
                        </header>
                        <?php if ( has_nav_menu( 'footer-menu-3' ) ) : wp_nav_menu( array( 'theme_location' =>   'footer-menu-3' ) ); endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ( has_nav_menu( 'footer-menu-4' ) || $col_heading_4 ) : ?>
                    <div class="col-sm-auto">
                        <header>
                            <?php if($col_heading_4_link) : ?><a href="<?php echo $col_heading_4_link; ?>"><?php endif; ?>
                            <?php echo $col_heading_4; ?>
                            <?php if($col_heading_4_link) : ?></a><?php endif; ?>
                        </header>
                        <?php if ( has_nav_menu( 'footer-menu-4' ) ) : wp_nav_menu( array( 'theme_location' =>   'footer-menu-4' ) ); endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ( has_nav_menu( 'footer-menu-5' ) || $col_heading_5 ) : ?>
                    <div class="col-sm-auto">
                        <header>
                            <?php if($col_heading_5_link) : ?><a href="<?php echo $col_heading_5_link; ?>"><?php endif; ?>
                            <?php echo $col_heading_5; ?>
                            <?php if($col_heading_5_link) : ?></a><?php endif; ?>
                        </header>
                        <?php if ( has_nav_menu( 'footer-menu-5' ) ) : wp_nav_menu( array( 'theme_location' =>   'footer-menu-5' ) ); endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ( has_nav_menu( 'footer-menu-6' ) || $col_heading_6 ) : ?>
                    <div class="col-sm-auto">
                        <header>
                            <?php if($col_heading_6_link) : ?><a href="<?php echo $col_heading_6_link; ?>"><?php endif; ?>
                            <?php echo $col_heading_6; ?>
                            <?php if($col_heading_6_link) : ?></a><?php endif; ?>
                        </header>
                        <?php if ( has_nav_menu( 'footer-menu-6' ) ) : wp_nav_menu( array( 'theme_location' =>   'footer-menu-6' ) ); endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="site-links">
        <div class="container">
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <?php if( have_rows('website_links', 'option') ): ?>
                    <?php while( have_rows('website_links', 'option') ): the_row(); 
                        $linkItem = get_sub_field('website_link_item'); 
                        if( $linkItem ): 
                            $linkItem_url = $linkItem['url'];
                            $linkItem_title = $linkItem['title'];
                            $linkItem_target = $linkItem['target'] ? $linkItem['target'] : '_self';
                        ?>
                        <div class="col-sm-auto">
                            <a href="<?php echo esc_url( $linkItem_url ); ?>" target="<?php echo esc_attr( $linkItem_target ); ?>"><?php echo esc_html( $linkItem_title ); ?></a>
                        </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <aside id="site-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md order-2 order-md-1">
                    <span><?php the_field('website_copyright', 'option'); ?></span>
                </div>
                <div class="col-md-auto order-1 order-md-2">
                    <div class="social">
                        <?php if( have_rows('website_social', 'option') ): ?>
                            <?php while( have_rows('website_social', 'option') ): the_row(); 
                                $image = get_sub_field('website_social_icon');
                                $link = get_sub_field('website_social_link');
                            ?>
                            <a href="<?php echo $link; ?>" title="<?php echo $image['alt'] ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</footer>
<?php wp_footer(); ?>
<?php the_field("ts_code_footer", "options"); ?>
<a href="#" id="back-to-top" title="<?php _e('Back to top', 'pa'); ?>"></a>
</body>
</html>