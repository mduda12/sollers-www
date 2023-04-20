<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="http://sollers.test/wp-content/themes/promoagency/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ref1niz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <?php the_field("ts_code_head", "options"); ?>

	<title><?php echo esc_html( get_the_title() );  ?> </title>

</head>
<body <?php body_class(); ?> <?php if ( is_front_page() ) { echo 'id="pa-home-page"'; } ?>>
<?php the_field("ts_code_body", "options"); ?>

<?php if(!(is_404())) : ?>
    <div class="pa-menu-bar nav-down home-layout">
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>

    <?php if(!(is_page_template('front-page.php'))) : ?>
    <div class="pa-breadcrums">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php echo do_shortcode('[flexy_breadcrumb]'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
