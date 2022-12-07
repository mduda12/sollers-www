<?php
/*
* Template for displaying custom post type - Career
*/
get_header(); ?>

<main class="ca-main-single">

<section class="ca-single-top-back" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
  <div class="container">
    <h2><?php the_title(); ?></h2>
  </div>
</section>

<section class="ca-single-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="ca-single-content-top">
          <h4><?php the_field('career_single_top_header') ?></h4>
          <?php the_field('career_single_top_description') ?>
        </div>
        <?php if( have_rows('career_single_content') ): ?>
          <?php while( have_rows('career_single_content') ): the_row();
            $career_single_content_header = get_sub_field('career_single_content_header');
            $career_single_content_description = get_sub_field('career_single_content_description');
            ?>
            <div class="ca-single-content-main">
              <h4><?php echo $career_single_content_header; ?></h4>
              <p><?php echo $career_single_content_description; ?></p>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <div class="col-lg-4">
        <div class="ca-single-content-box">
          <div class="insights-filter-ca">
            <div class="insights-filter-results__item">
              <div class="insights-filter-results__item__bottom">
                <div class="insights-filter-results__item__title">
                  <a><?php the_title(); ?></a>
                </div>
                <div class="insights-filter-results__item__city">
                  <?php echo strip_tags( get_the_term_list( get_the_ID(), 'careers_offices', '', ', ' ) ); ?>
                </div>
                <div class="insights-filter-results__item__desc">
                  <?php the_field('career_single_excerpt'); ?>
                </div>
                <div class="insights-filter-results__item__cta">
                  <a data-toggle="modal" data-target="#careerModal" class="btn btn-default"><span><?php _e("Apply now:", "pa"); ?></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  // Career page ID to list benefits section as global
  if(get_field('benefits_page_selection')):
	  $page_array= get_field('benefits_page_selection');
	  $other_page = $page_array[0];  //177;
  else:
  	$other_page= 177;
  endif;
//echo $other_page;
?>
<section class="ca-single-bottom">
  <div class="container">
    <div class="ca-single-benefits-wrapper">
      <div class="ca-benefits">
        <div class="ca-benefits-top">
          <h3><?php the_field('careers_benefits_header', $other_page); ?></h3>
          <p><?php the_field('careers_benefits_description', $other_page); ?></p>
        </div>
        <div class="ca-benefits-nav">
          <ul>
            <?php if( have_rows('careers_benefits_tabs', $other_page) ): $i=0; ?>
            	<?php while( have_rows('careers_benefits_tabs', $other_page) ): the_row(); $i++;
            		$careers_benefits_tab_header = get_sub_field('careers_benefits_tab_header');
            		?>
                <li>
                  <a data-id="<?php echo $i; ?>" <?php if( $i == 1 ) : ?> class="active"<?php endif; ?>>
                    <?php echo $careers_benefits_tab_header; ?>
                  </a>
                </li>
            	<?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </div>
        <div class="ca-benefits-content">
          <?php if( have_rows('careers_benefits_tabs', $other_page) ): $i=0; ?>
            <?php while( have_rows('careers_benefits_tabs', $other_page) ): the_row(); $i++;
              $careers_benefits_tab_content = get_sub_field('careers_benefits_tab_content');
              ?>
              <div class="ca-benefits-content-tab" data-id="<?php echo $i; ?>" <?php if( $i > 1 ) : ?>style="display: none;"<?php endif; ?>>
                <div class="row justify-content-sm-center">
                  <?php if( have_rows('careers_benefits_tab_content', $other_page) ): ?>
                  	<?php while( have_rows('careers_benefits_tab_content', $other_page) ): the_row();
                  		$careers_benefits_tab_content_icon = get_sub_field('careers_benefits_tab_content_icon');
                      $careers_benefits_tab_content_description = get_sub_field('careers_benefits_tab_content_description');
                  		?>
                      <div class="col-md-3 col-sm-6">
                        <div class="ca-benefits-tile">
                          <div class="ca-benefits-tile-ico" style="background-image: url('<?php echo $careers_benefits_tab_content_icon; ?>')"></div>
                          <div class="ca-benefits-tile-desc"><?php echo $careers_benefits_tab_content_description; ?></div>
                        </div>
                      </div>
                  	<?php endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
      <?php if( get_field('career_single_process_header') ) : ?>
        <div class="ca-single-process">
          <h4><?php the_field('career_single_process_header') ?></h4>
          <div class="row">
            <?php if( have_rows('career_single_process_content') ): ?>
              <?php while( have_rows('career_single_process_content') ): the_row();
                $career_single_process_content_image = get_sub_field('career_single_process_content_image');
                $career_single_process_content_header = get_sub_field('career_single_process_content_header');
                ?>
                <div class="col-lg-3 col-md-6">
                  <img class="img-fluid" src="<?php echo $career_single_process_content_image; ?>" alt="<?php echo $career_single_process_content_header; ?>">
                  <p><?php echo $career_single_process_content_header; ?></p>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if( get_field('career_single_tips_header') ) : ?>
        <div class="ca-single-tips">
          <h4><?php the_field('career_single_tips_header') ?></h4>
          <div class="row">
            <?php if( have_rows('career_single_tips_content') ): ?>
              <?php while( have_rows('career_single_tips_content') ): the_row();
                $career_single_tips_content_image = get_sub_field('career_single_tips_content_image');
                $career_single_tips_content_name = get_sub_field('career_single_tips_content_name');
                $career_single_tips_content_position = get_sub_field('career_single_tips_content_position');
                $career_single_tips_content_description = get_sub_field('career_single_tips_content_description');
                ?>
                <div class="col-md-6">
                  <div class="ca-single-tips-tile">
                    <div class="ca-single-tips-tile-thumb" style="background-image: url('<?php echo $career_single_tips_content_image; ?>')"></div>
                    <div class="ca-single-tips-tile-header"><?php echo $career_single_tips_content_name; ?>, <span><?php echo $career_single_tips_content_position; ?></span></div>
                    <div class="ca-single-tips-tile-desc">
                      <p><?php echo $career_single_tips_content_description; ?></p>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if( get_field('career_single_path_header') ) : ?>
        <div class="ca-single-tips">
          <h4><?php the_field('career_single_path_header') ?></h4>
          <div class="ca-single-tips-image">
            <img class="img-fluid" src="<?php the_field('career_single_path_image') ?>" alt="">
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="ca-single-contact" style="background-image: url('<?php bloginfo('template_directory') ?>/dist/img/career/ca-single-contact-back.jpg')">
  <div class="container">
    <div class="ca-single-contact-inner">
      <h2><?php the_field('career_contact_header', 'option') ?></h2>
      <p><?php the_field('career_contact_description', 'option') ?></p>
      <a data-toggle="modal" data-target="#careerContactModal" class="btn btn-full-white--border">
        <span><?php _e("Send message", "pa"); ?></span>
      </a>
    </div>
  </div>
</section>

<div class="modal fade caModal" id="careerModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"></button>
        <?php the_field('career_single_contact_form'); ?>
      </div>
      <img class="caModal-logo" src="<?php bloginfo('template_directory') ?>/dist/img/career/ca-single-form-logo.svg" alt="">
    </div>
  </div>
</div>

<div class="modal fade caModal" id="careerContactModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"></button>
        <?php the_field('career_contact_form_select', 'option'); ?>
      </div>
      <img class="caModal-logo" src="<?php bloginfo('template_directory') ?>/dist/img/career/ca-single-form-logo.svg" alt="">
    </div>
  </div>
</div>

</main>


//<script>
//$('input[name=radio-270]').click(function() {

  //  if($('#job_field')){
//		var x =  document.getElementById("job_field");
//		x.value = 100;
    
  //  //alert($('input[name=radio-270]:checked').val());
   // if( $('input[name=radio-270]:checked').val() == 'Part time job'){
     //  x.value = 50;
    //}else{
    
    //x.value = 100;
    //}
    
    //};
   
//});


//</script>


<?php get_footer(); ?>
