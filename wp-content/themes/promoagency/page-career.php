<?php
/* Template Name: Careers */
global $wpdb;
$pathCounters = [];
foreach ($wpdb->get_results("
    select tr.term_taxonomy_id as id, t.name as name, count(p.ID) as count
    from wp_posts as p
             left join wp_term_relationships as tr on p.ID = tr.object_id
             left join wp_term_taxonomy tt on tr.term_taxonomy_id = tt.term_taxonomy_id
             left join wp_terms t on tt.term_id = t.term_id
             left JOIN wp_icl_translations tl ON p.ID = tl.element_id AND tl.element_type = CONCAT('post_', p.post_type)  
    where p.post_status = 'publish'
          and p.post_type = 'careers'
              and taxonomy = 'careers_path'
    and tl.language_code = '".ICL_LANGUAGE_CODE."'
    group by t.name;
") as $counter) {
	$pathCounters[$counter->id] = $counter->count;
}
get_header();
?>

<main class="ca-main">

<section class="ca-top-back" style="background-image: url('<?php the_field('careers_header_background'); ?>')">
  <?php if( get_field('careers_header_youtube_video_id') ) : ?>
    <div class="ca-top-back-video">
      <div id="ca-iframe-video"></div>
    </div>
  <?php endif; ?>
  <div class="ca-top-back-svg">
    <svg version="1.1"
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 1080"
        style="enable-background:new 0 0 1920 1080; bottom: 0; left: 0; height: 100%;" xml:space="preserve" class="hero-stripe hero-stripe__one">
    <polygon class="svg-stripe-one animated" data-delay="0.3s" data-animation="fadeInLeft" points="634.7,0 0,0 0,1080 1157.2,1080 "/>
    </svg>
    <svg version="1.1"
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 1080"
        style="enable-background:new 0 0 1920 1080; bottom: 0; left: 0; height: 100%;" xml:space="preserve" class="hero-stripe hero-stripe__three">
    <polygon class="svg-stripe-three animated" data-animation="fadeInLeft" points="1239.34,1080.01 1157.26,1080.01 634.75,0 716.84,0.01 "/>
    </svg>
  </div>
  <div class="container">
    <h1><?php the_field('careers_header') ?> <span><?php the_field('careers_header_light') ?></span></h1>
  </div>
</section>

<section class="ca-numbers pa-number-counter">
  <div class="container">
    <div class="row">
      <?php if( have_rows('numbers_content') ): ?>
        <?php while( have_rows('numbers_content') ): the_row();
          $numbers_content_value = get_sub_field('numbers_content_value');
          $numbers_content_icon = get_sub_field('numbers_content_icon');
          $numbers_content_header = get_sub_field('numbers_content_header');
          $numbers_content_subheader = get_sub_field('numbers_content_subheader');
          ?>
          <div class="col-md-3 col-sm-6">
            <div class="ca-numbers-tile">
              <span>
                <div data-count="<?php echo $numbers_content_value; ?>" class="number-counter-value"></div>
                <img src="<?php echo $numbers_content_icon; ?>" alt="<?php echo $numbers_content_header; ?> <?php echo $numbers_content_subheader; ?>">
              </span>
              <div class="ca-numbers-tile-inner">
                <p><?php echo $numbers_content_header; ?></p>
                <p><?php echo $numbers_content_subheader; ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="ca-path">
  <div class="container">
    <div class="ca-path-header">
      <h2><?php the_field('careers_path_header') ?></h2>
    </div>
    <div class="row" style="justify-content: center">
      <?php if( have_rows('careers_path_content') ): $tile = 0; ?>
        <?php while( have_rows('careers_path_content') ): the_row(); $tile++;
          $careers_path_content_background = get_sub_field('careers_path_content_background');
          $careers_path_content_header = get_sub_field('careers_path_content_header');
          $careers_path_content_header_light = get_sub_field('careers_path_content_header_light');
          $careers_path_content_description = get_sub_field('careers_path_content_description');
          $careers_path_taxonomy = get_sub_field('careers_path_taxonomy');
          if(empty($pathCounters[$careers_path_taxonomy]) || !$pathCounters[$careers_path_taxonomy]) { // hide path if no positions
              continue;
          }
          ?>
          <div class="col-lg-3 col-md-6">
            <div class="ca-path-tile" data-id="<?php echo $tile; ?>" style="background-image: url('<?php echo $careers_path_content_background; ?>')">
              <div class="ca-path-tile-back" style="background-image: url('<?php echo $careers_path_content_background; ?>')"></div>
              <div class="ca-path-tile-desc">
                <h4>
                  <?php echo $careers_path_content_header; ?>
                  <?php if( $careers_path_content_header_light ) : ?> <span><?php echo $careers_path_content_header_light; ?></span><?php endif; ?>
                </h4>
                <p><?php echo $careers_path_content_description; ?></p>
              </div>
              <div class="ca-path-tile-link">
                <a href="#ca-results" class="btn btn-gray arrow_down">
                  <span><?php echo isset($pathCounters[$careers_path_taxonomy]) ? $pathCounters[$careers_path_taxonomy] : '0'?> POSITIONS</span>
                </a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="ca-info ca-hidden-search" id="ca-results" style="display: none;">
  <div class="container">
    <a class="ca-hidden-search-close"><?php _e("Close", "pa"); ?></a>
    <?php if( have_rows('careers_path_content') ): $desc = 0; ?>
      <?php while( have_rows('careers_path_content') ): the_row(); $desc++;
        $careers_path_content_top_description = get_sub_field('careers_path_content_top_description');
        ?>
        <div class="ca-info-desc" data-id="<?php echo $desc ?>" style="display: none;">
          <?php echo $careers_path_content_top_description; ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>

<section class="insights-filter-wrap insights-filter-wrap-ca ca-hidden-search" style="display: none;">
  <div class="container">
    <?php echo do_shortcode( '[searchandfilter id="3731"]' ); ?>
  </div>
</section>

<section class="insights-results-wrap insights-results-wrap-ca ca-hidden-search" style="display: none;">
  <?php echo do_shortcode( '[searchandfilter id="3731" show="results"]' ); ?>
</section>

<section class="ca-baner ca-hidden-search" style="display: none;">
  <div class="container">
    <h3><?php the_field('careers_path_bottom_baner_header') ?></h3>
    <a data-toggle="modal" data-target="#careerModal" class="btn btn-full-green">
      <span><?php _e("Apply now", "pa"); ?></span>
    </a>
  </div>
</section>

<section class="ca-benefits" id="benefits" >
  <div class="container">
    <div class="ca-benefits-top">
      <h3><?php the_field('careers_benefits_header'); ?></h3>
      <?php the_field('careers_benefits_description'); ?>
    </div>
    <div class="ca-benefits-nav">
      <ul>
        <?php if( have_rows('careers_benefits_tabs') ): $i=0; ?>
        	<?php while( have_rows('careers_benefits_tabs') ): the_row(); $i++;
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
      <?php if( have_rows('careers_benefits_tabs') ): $i=0; ?>
        <?php while( have_rows('careers_benefits_tabs') ): the_row(); $i++;
          $careers_benefits_tab_content = get_sub_field('careers_benefits_tab_content');
          ?>
          <div class="ca-benefits-content-tab" data-id="<?php echo $i; ?>" <?php if( $i > 1 ) : ?>style="display: none;"<?php endif; ?>>
            <div class="row justify-content-sm-center">
              <?php if( have_rows('careers_benefits_tab_content') ): ?>
              	<?php while( have_rows('careers_benefits_tab_content') ): the_row();
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
</section>

<section class="ca-slider"  >
  <div class="ca-slider-slick" id="slsl"  >
    <?php $images = get_field('careers_office_slider');
    if( $images ): ?>
      <?php foreach( $images as $image ): ?>
        <div>
          <div class="ca-slider-slick-wrapper" style="background-image: url('<?php echo esc_url($image['url']); ?>')"></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<section class="ca-abroad" id="abroad-slider">
  <div class="container">
    <div class="ca-abroad-slider">
      <?php if( have_rows('career_abroad_onboard_content') ): ?>
        <?php while( have_rows('career_abroad_onboard_content') ): the_row();
          $career_ao_content_image = get_sub_field('career_ao_content_image');
          $career_ao_content_header = get_sub_field('career_ao_content_header');
          $career_ao_content_description = get_sub_field('career_ao_content_description');
          ?>
          <div>
            <div class="row align-items-center">
              <div class="col-sm-6">
                <?php if( $career_ao_content_image ) : ?>
                  <img class="img-fluid" src="<?php echo $career_ao_content_image; ?>" alt="<?php echo $career_ao_content_header; ?>">
                <?php endif; ?>
              </div>
              <div class="col-sm-6">
                <div>
                  <h3><?php echo $career_ao_content_header; ?></h3>
                  <?php echo $career_ao_content_description; ?>
                </div>
                <div class="ca-abroad-slider-nav">
                  <div class="ca-abroad-prev"></div>
                  <div class="ca-abroad-next"></div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="ca-slider">
  <div class="ca-slider-slick">
    <?php $images = get_field('careers_events_slider');
    if( $images ): ?>
      <?php foreach( $images as $image ): ?>
        <div>
          <div class="ca-slider-slick-wrapper" style="background-image: url('<?php echo esc_url($image['url']); ?>')"></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<section class="ca-events">
  <div class="container">
    <h3><?php the_field('careers_events_header') ?></h3>
    <div class="ca-events-slider">
      <?php if( have_rows('careers_events_content') ): ?>
        <?php while( have_rows('careers_events_content') ): the_row();
          $careers_events_content_header = get_sub_field('careers_events_content_header');
          $careers_events_content_location = get_sub_field('careers_events_content_location');
          $careers_events_content_date = get_sub_field('careers_events_content_date');
          $careers_events_content_page_link = get_sub_field('careers_events_content_page_link');
          ?>
          <div class="insights-filter-ca">
            <div class="insights-filter-results__item">
              <div class="insights-filter-results__item__bottom event">
                <div class="insights-filter-results__item__title">
                  <a href="<?php echo $careers_events_content_page_link; ?>"><?php echo $careers_events_content_header; ?></a>
                </div>
                <div class="insights-filter-results__item__city event"><?php echo $careers_events_content_location; ?></div>
                <div class="insights-filter-results__item__desc"><?php echo $careers_events_content_date; ?></div>
                <?php if(!empty($careers_events_content_page_link)): ?>
                    <div class="insights-filter-results__item__cta">
                      <a target="_blank" href="<?php echo $careers_events_content_page_link; ?>" class="btn btn-default"><span><?php _e("Event site:", "pa"); ?></span></a>
                    </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <?php if( get_field('careers_all_events_button_text') ) : ?>
      <div class="ca-events-btn-wrapper">
        <a href="<?php the_field('careers_all_events_page_url') ?>" class="btn btn-gray-dark"><span><?php the_field('careers_all_events_button_text') ?></span></a>
      </div>
    <?php endif; ?>
  </div>
</section>

<section class="ca-video">
  <div class="ca-video-wrapper">
    <div class="ca-video-wrapper-play" data-toggle="modal" data-target="#caVideo">
      <span><?php _e("PLAY VIDEO", "pa"); ?></span>
    </div>
    <div class="ca-video-wrapper-poster" style="background-image: url('<?php the_field('careers_video_poster') ?>')">
  </div>
</section>

</main>

<?php $popup = get_field("careers_popup_content"); if ($popup) : ?>
  <div id="careerPopup" class="homepage-popup" style="background-color:<?php the_field('careers_popup_background'); ?>">
    <div class="homepage-popup__wrapper">
      <span class="popup-close">X</span>
      <?php echo $popup; ?>
    </div>
  </div>
<?php endif ?>

<div class="modal fade ca-video-modal" id="caVideo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="embed-container">
          <iframe width="100%" height="100%" src="<?php the_field('careers_video_youtube_url') ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade caModal" id="careerModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"></button>
        <?php the_field('careers_path_bottom_baner_contact_form'); ?>
      </div>
      <img class="caModal-logo" src="<?php bloginfo('template_directory') ?>/dist/img/career/ca-single-form-logo.svg" alt="">
    </div>
  </div>
</div>

<script>
/* Scroll to anchor */
/*
function pgshow(e){
    var elId = window.location.hash;
    if (elId.length > 1){
        el = document.getElementById(elId.substr(1));
        if (el) el.scrollIntoView(true);
    }
}
*/

// pageshow fires after load and on Back/Forward
//window.addEventListener('pageinit', pgshow);

if (window.location.hash) {
    var hash = window.location.hash;

    if ($(hash).length) {
        $('html, body').animate({
            scrollTop: $(hash).offset().top -1200
        }, 4000, 'swing');
    }
}



</script>



<?php if( get_field('careers_header_youtube_video_id') ) : ?>
<script>
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;
  function onYouTubeIframeAPIReady() {
      player = new YT.Player('ca-iframe-video', {
      height: '100%',
      width: '100%',
      videoId: '<?php the_field('careers_header_youtube_video_id') ?>',
      playerVars: {
          'autoplay': 0,
          'modestbranding': 1,
          'controls': 0,
          'showinfo': 0,
          'loop': 1,
          'playlist': '<?php the_field('careers_header_youtube_video_id') ?>',
          'rel': 0,
      },
      events: {
          'onReady': onPlayerReady,
      }
      });
  }

  function onPlayerReady(event) {
      event.target.playVideo();
      event.target.mute();
      event.target.setPlaybackQuality('hd1080');
  }
</script>
<?php endif; ?>

<script>
/* Scroll to anchor */
/*
function pgshow(e){
    var elId = window.location.hash;
    if (elId.length > 1){
        el = document.getElementById(elId.substr(1));
        if (el) el.scrollIntoView(true);
    }
}
*/

// pageshow fires after load and on Back/Forward
//window.addEventListener('pageshow', pgshow);

</script>


<?php get_footer(); ?>
