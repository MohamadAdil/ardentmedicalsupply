<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ardent_Medical_Supply
 */

$footer_logo = get_field('footer_logo', 'option');
$product_tags = get_terms(
	array(
		'taxonomy' => 'product_tag',
		'hide_empty' => false,
	));
?>

<footer class="footer" style="background-color: #191C1F;">
	<div class="container">
		<div class="footer-wrap">
			<div class="row">
				<div class="col-lg-3 mb-20">
					<div class="first-ft">
						<figure>
							<?php
							if ($footer_logo) {
								echo wp_get_attachment_image($footer_logo, 'full');
							}
							?>
						</figure>
						<div class="contact-dt">
							<p>Customer Supports:</p>
							<a href="tel:+347-425-1334">
								<?php echo get_field('custom_support_number', 'option'); ?>
							</a>
						</div>
						<div class="adresss">
							<p>
								<?php echo get_field('address', 'option'); ?>
							</p>
						</div>
						<div class="mail">
							<a href="mailto:info@ardentmedicalsupply.com">
								<?php echo get_field('email', 'option'); ?>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-sm-6 mb-2-">
					<div class="second-ft">
						<h5>Top Category</h5>
						<ul>
							<?php
							wp_nav_menu( [
								'theme_location' => 'menu-2',
							] )
							?>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-20">
					<div class="third-ft">
						<div class="row">
							<div class="col-lg-6">
							<h5>Quick links</h5>
								<ul>
									<li>
										<a href="#">Help Center</a>
									</li>
									<li>
										<a href="#">Track Your Order</a>
									</li>
									<li>
										<a href="#">Shipping & Delivery</a>
									</li>
									<li>
										<a href="#">Returns & Exchanges</a>
									</li>
									<li>
										<a href="#">Are We Missing an Item?</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-6">
							   <h5>Social Links</h5>
								<ul class="social-icn">
									<?php
									if (have_rows('social_icon_links', 'option')) :
										while (have_rows('social_icon_links', 'option')) : the_row();
										$facebook_link = get_sub_field('facebook_link');
										$instagram_link = get_sub_field('instagram_link');
										$youtube_link = get_sub_field('youtube_link');
									endwhile;
								endif;
									?>
									<li>
										<a href="<?php echo $facebook_link; ?>"><i class="fa-brands fa-facebook"></i></a>
									</li>
									<li>
										<a href="<?php echo $instagram_link; ?>"><i class="fa-brands fa-instagram"></i></a>
									</li>
									<li>
										<a href="<?php echo $youtube_link; ?>"><i class="fa-brands fa-youtube"></i></a>
									</li>
							
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 mb-20">
					<div class="fourth-ft">
						<h5>Popular Tag</h5>
						<ul>
							<?php
							if (!empty($product_tags) && !is_wp_error($product_tags)) {
								foreach ($product_tags as $product_tag) {
									?>
									<li>
										<a href="<?php echo get_term_link( $product_tag ); ?>"><?php echo $product_tag->name; ?></a>
									</li>
									<?php
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="footer-btm" style="background-color: #191C1F;">
	<div class="container">
		<div class="btm-wrap">
			<a href="#">©
				<?php echo date('Y'); ?>
				<?php echo get_field('all_rights_reserved', 'option'); ?>
			</a>
		</div>

	</div>
</div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

<?php wp_footer(); ?>

</body>

</html>