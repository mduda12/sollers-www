<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://use.typekit.net/ref1niz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <?php the_field("ts_code_head", "options"); ?>
</head>
<body <?php body_class(); ?>>
<?php the_field("ts_code_body", "options"); ?>

<?php if(!(is_404())) : ?>
    <div class="pa-menu-bar nav-down">
    <?php wp_nav_menu( array( 'theme_location' => 'landing-menu' ) ); ?>
    </div>

<?php endif; ?>