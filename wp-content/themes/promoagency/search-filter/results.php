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
					$sf_current_query = $searchandfilter->get($args['search_filter_id'])->current_query();

					$args = array(
						"str" 					=> '%2$s',
						"delim" 				=> array(", ", " - "),
						"field_delim"				=> ', ',
						"show_all_if_empty"			=> false
					);
				?>
				<div class="insights-filter-results__header insights-filter-ca-results__header">
					<?php _e("We have", "pa"); ?> <span class="insights-filter-results__header__result insights-filter-ca-results__header__result"><?php echo count($query->posts) ?></span> <?php _e("open positions", "pa"); ?>
				</div>
			</div>
		</div>

		<div class="row">
		<?php
			while ($query->have_posts())
			{
				$query->the_post();
				?>
				<div class="col-lg-4 col-sm-6">
					<div class="insights-filter-ca">
						<div class="insights-filter-results__item">
							<div class="insights-filter-results__item__bottom">
								<div class="insights-filter-results__item__title">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</div>
								<div class="insights-filter-results__item__city">
                                    <?php echo strip_tags( get_the_term_list( get_the_ID(), 'careers_offices', '', ', ' ) ); ?>
								</div>
								<div class="insights-filter-results__item__desc">
                                    <?php the_field('career_single_excerpt'); ?>
								</div>
								<div class="insights-filter-results__item__cta">
									<a href="<?php the_permalink(); ?>" class="btn btn-default" target="_blank"><span><?php _e("Apply now:", "pa"); ?></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
		?>
		</div>
		<?php if (function_exists('wp_pagenavi')) :?>
			<div class="row">
				<div class="col">
					<div class="insights-filter-results__pagination">
						<?php echo "<br />";
						wp_pagenavi( array( 'query' => $query ) ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
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
