<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header();
?>
<section class="main-products">
	<div class="container">
		<div class="main-pdt-wrap">
			<div class="row">
				<div class="col-md-3">
					<div class="categories-sidebar">
						<h4>Categories</h4>
						<ul>
							<?php get_sidebar('shop'); ?>
						</ul>
					</div>
				</div>
				<div class="col-md-9">
					<div class="prdt-right">
						<div class="filer-wrap">
							<div class="Brand">
								<div class="btn-group">
									<button type="button" class="box-btn" data-bs-toggle="dropdown"
										aria-expanded="false">
										Brand <i class="ms-3 fa-solid fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end">
										<li><button class="dropdown-item" type="button">
												<?php echo do_shortcode('[pwb-az-listing]'); ?>
											</button></li>
									</ul>
								</div>
							</div>

							<div class="recomended">
								<form method="get">
									<div class="btn-group">
										<?php
										$args = ardental_filter_products($orderby);
										?>
										<button type="button" class="box-btn" data-bs-toggle="dropdown"
											aria-expanded="false">
											Recommended <i class="ms-3 fa-solid fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu dropdown-menu-end">
											<li><button class="dropdown-item" name="orderby" value="latest"
													type="submit">Latest</button></li>
											<li><button class="dropdown-item" name="orderby" value="popular"
													type="submit">Popular</button></li>
											<li><button class="dropdown-item" name="orderby" value="insurance"
													type="submit">Insurance</button></li>
											</li>
										</ul>
									</div>
								</form>
							</div>

							<div class="price">
								<div class="btn-group">
									<?php echo do_action('woocommerce_before_shop_loop'); ?>
								</div>
							</div>
						</div>
						<?php
						$orderby = (isset($_GET['orderby'])) ? $_GET['orderby'] : 'date';
						$args = ardental_filter_products($orderby);
						$query = new WP_Query($args);
						if (woocommerce_product_loop()) {
							// do_action('woocommerce_sidebar');
							woocommerce_product_loop_start();

							if ($orderby == "latest" || $orderby == "popular" || $orderby == "insurance") {
								if (wc_get_loop_prop('total')) {


									while ($query->have_posts()) {
										$query->the_post();

										do_action('woocommerce_shop_loop');

										wc_get_template_part('content', 'product');
									}
								}
							} else {
								if (wc_get_loop_prop('total')) {


									while (have_posts()) {
										the_post();

										do_action('woocommerce_shop_loop');

										wc_get_template_part('content', 'product');
									}
								}
							}

							woocommerce_product_loop_end();


							do_action('woocommerce_after_shop_loop');
						} else {
							do_action('woocommerce_no_products_found');
						}

						do_action('woocommerce_after_main_content');
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="our-partners" style="background-color: #445FAB;">
	<div class="container">
		<div class="our-pt-wrap">
			<h2 class="common-h2">Our Partners</h2>
			<ul>
				<?php
				$our_partners = get_field('our_partners', 'option');
				if ($our_partners) {
					foreach ($our_partners as $attachment_id) {
						?>
						<li>
							<?php echo wp_get_attachment_image($attachment_id, 'full'); ?>
						</li>
						<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
</section>

<?php
get_footer();
