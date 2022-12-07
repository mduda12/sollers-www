<?php $background = $instance['widget_settings']['widget_bg']; ?>
<section class="pa-slider-tmi <?php if( $background === 'left') { echo 'pa-background-left'; } elseif($background === 'right') { echo 'pa-background-right'; }; ?> <?php $alternative = ($instance['widget_settings']['widget_alternative']); if($alternative) : echo ' pa-alternative'; endif; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="pa-slider-tmi__header">
					<h2 class="header pa-header__mid"><?php echo ($instance['slider_header']['slider_title']) ?></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="pa-slider-tmi__wrapper">
					<div class="pa-slider-tmi__nav">
						<span class="navigation slider-prev tmi-prev <?php if($alternative) : echo 'violet'; endif; ?>"></span><span class="navigation slider-next tmi-next"></span>
					</div>
					<div class="pa-slider-tmi-init">

						<?php 

						$insights_number = $instance['posts_query']['insights_number'];
						$insights_tags = $instance['posts_query']['tags'];

						$insight_tags_string = implode( ',', $insights_tags );
						$insight_tags_array = explode( ',', $insight_tags_string );

						$queryargs = array(
							'post_type'              => array( 'insights' ),
							'post_status'            => array( 'publish' ),
							'order'                  => 'DSC',
							'orderby'				 => 'date',
							'posts_per_page' 		 => $insights_number,
							'tax_query' => array(
								'relation' => 'OR',
								array (
									'taxonomy' => 'topics',
									'field' => 'slug',
									'terms' => $insight_tags_array,
								),
							),
						);

						$insights = new WP_Query( $queryargs );

						if ( $insights->have_posts() ) {
							while ( $insights->have_posts() ) {
								$insights->the_post();
						?>
							
							<article class="pa-slider-tmi__box">
									
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

									<div class="pa-slider-tmi__data data">
										<span class="category">
										
										<?php

											$postIds = get_the_ID();

											$term_obj_list = get_the_terms( $postIds, 'post_tag' );
											$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));

											echo $terms_string;
										?>
									
										</span>
										<span class="title">
										<?php 
											$insights_title = the_title();
											echo trim_text($insights_title, "...", 85 );  
										?>
										</span>
										<div class="pa-slider-tmi__data--hover hover">
											<span class="intro">

												<?php 
													$insights_slider_excerpt = get_field('insights_slider_excerpt');
													echo trim_text($insights_slider_excerpt, "...", 135 );  
												?>

											</span>
											<?php if ( $alternative ) : ?>
												<a href="<?php the_permalink(); ?>" target="_self" class="btn btn-violet"><span><?php _e("Read more", "pa"); ?></span></a>
											<?php else : ?>
												<a href="<?php the_permalink(); ?>" target="_self" class="btn btn-default"><span><?php _e("Read more", "pa"); ?></span></a>
											<?php endif ?>
										</div>
									</div>
								</article>

						<?php } }

						// Restore original Post Data
						wp_reset_postdata();

						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
