<?php
/* Template Name: Landing */
?>
<?php get_header('landing'); ?>

<?php 
if (have_posts()) :
    while (have_posts()) :
       the_post();
          the_content();
    endwhile;
 endif;
?>

<?php get_footer(); ?>