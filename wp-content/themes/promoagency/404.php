<?php get_header(); ?>
<div class="pa-404">
    <div class="pa-404__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo-404.png" alt="<?php _e("Sollers", "pa"); ?>">
    </div>
    <div class="pa-404__content">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/content-404.png" alt="<?php _e("404", "pa"); ?>">
        <div class="info"><?php _e("Ooops! Page not found", "pa"); ?></div>
    </div>
    <div class="pa-404__btn">
        <a href="<?php echo get_home_url(); ?>" class="btn btn-default"><span><?php _e("Home page", "pa"); ?></span></a>
    </div>
</div>
<?php wp_footer(); ?>

