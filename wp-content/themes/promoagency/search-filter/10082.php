<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() ) { ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<?php
					global $searchandfilter;
					$sf_current_query = $searchandfilter->get(2901)->current_query();

					$args = array(
						"str" 					=> '%2$s',
						"delim" 				=> array(", ", " - "),
						"field_delim"				=> ', ',
						"show_all_if_empty"			=> false
					);
				?>
				<div class="insights-filter-results__header pa-header__mid">
					<?php _e("Material type:", "pa"); ?> <span class="insights-filter-results__header__list"><?php echo $sf_current_query->get_fields_html( array("_sft_types"),$args); ?></span>
				</div>
			</div>
		</div>

		<div class="row">
		<?php
			while ($query->have_posts())
			{
				$query->the_post();

				?>
				<div class="col-lg-4 col-md-6">
					<div class="insights-filter-results__item">
						<div class="insights-filter-results__item__top">
							<div class="insights-filter-results__item__image">
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
							</div>
							<div class="insights-filter-results__item__type">
								<?php

									$postIds = get_the_ID();

									$term_obj_list = get_the_terms( $postIds, 'types' );
									$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));

									echo $terms_string;
								?>
							</div>
						</div>
						<div class="insights-filter-results__item__bottom">
							<div class="insights-filter-results__item__tags">
							<?php

								$postIds = get_the_ID();

								$term_obj_list = get_the_terms( $postIds, 'post_tag' );
								$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));

								echo $terms_string;
							?>
							</div>
							<div class="insights-filter-results__item__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div>
							<div class="insights-filter-results__item__cta">
								<a href="<?php the_permalink(); ?>" class="btn btn-default"><span><?php _e("Read more:", "pa"); ?></span></a>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
		?>
		</div>
		<div class="row">
			<div class="col">
				<div class="insights-filter-results__pagination">
					<?php
						if (function_exists('wp_pagenavi'))
						{
							echo "<br />";
							wp_pagenavi( array( 'query' => $query ) );
						}
					?>
				</div>
			</div>
		</div>
	</div>

<?php } else { ?>

<div class="container">
	<div class="row">
		<div class="col">
			<div class="insights-filter-results__empty pa-header__mid">
				<?php _e("No Results Found", "pa"); ?>
			</div>
		</div>
	</div>
</div>

<?php } ?>
