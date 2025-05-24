<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ardent_Medical_Supply
 */

get_header();
$our_title = get_the_title(get_option('page_for_posts', true));
?>

<section class="hero">
	<div class="container">
		<?php
		if (have_rows('blog_banner_section', get_option('page_for_posts', true))) :
			while (have_rows('blog_banner_section', get_option('page_for_posts', true))) :
				the_row();
				$featured_image_id = get_sub_field('featured_image');
				$image_src = wp_get_attachment_image_src($featured_image_id, 'full');
		?>

				<div class="hero-wrap" style="background-image: url('<?php echo $image_src[0]; ?>');">
					<div class="h-txt">
						<h6 class="fs-14">
							<?php echo $our_title; ?>
						</h6>
						<h1 class="common-h1">
							<?php echo get_sub_field('heading'); ?>
						</h1>
						<p>
							<?php echo get_sub_field('description'); ?>
						</p>
					</div>
				</div>
		<?php
			endwhile;
		endif;
		?>
	</div>
</section>
<section class="blog-posts">
	<div class="container">
		<div class="blog-post-wrap">
			<div class="blog-top-bar">
				<div class="form-floating">
					<?php echo dynamic_sidebar('search-posts'); ?>
				</div>
				<div class="d-flex align-item-center gap-3">
					<div class="recomended">
						<form method="get">
							<div class="btn-group">
								<button type="button" class="box-btn" data-bs-toggle="dropdown" aria-expanded="false">
									Filter by Category <i class="ms-3 fa-solid fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<?php
									$args = array(
										'hide_empty' => 1,
									);
									$categories = get_categories($args);
									foreach ($categories as $category) {
										if ($category->slug == "uncategorized") {
											continue;
										}
									?>
										<li><button class="dropdown-item" name="category_filter" value="<?php echo esc_attr($category->slug) ?>" type="submit">
												<?php echo esc_html($category->name) ?>
											</button></li>
									<?php
									}
									?>
								</ul>
							</div>
						</form>
					</div>
					<div class="recomended">
						<form method="get">
							<div class="btn-group">
								<button type="button" class="box-btn" data-bs-toggle="dropdown" aria-expanded="false">
									Recommended <i class="ms-3 fa-solid fa-angle-down"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end">
									<li><button class="dropdown-item" name="orderby" value="latest" type="submit">Latest</button></li>
									<li><button class="dropdown-item" name="orderby" value="popular" type="submit">Popular</button></li>
									<li><button class="dropdown-item" name="orderby" value="insurance" type="submit">Insurance</button></li>
								</ul>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				$orderby = (isset($_GET['orderby'])) ? $_GET['orderby'] : 'date';
				$args = ardental_filter_blog_posts($orderby, 3);
				if (isset($_GET['category_filter']) && !empty($_GET['category_filter'])) {
					$args['category_name'] = sanitize_text_field($_GET['category_filter']);
				}
				$query = new WP_Query($args);
				if ($query->have_posts()) :
					while ($query->have_posts()) :
						$query->the_post();
				?>
						<div class="col-lg-4">
							<div class="card-blog card-1">
								<div class="card-image">
									<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
								</div>
								<div class="card-body">
									<div class="card-tp d-flex align-items-center">
										<div class="card-com first d-flex align-items-center">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.svg" alt="user">
											<p>
												<?php echo get_the_author(); ?>
											</p>
										</div>
										<div class="card-com second d-flex align-items-center">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="calendar">
											<p>
												<?php echo get_the_date('d M, Y'); ?>
											</p>
										</div>
										<div class="card-com third d-flex align-items-center">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/chat.svg" alt="chat">
											<p>
												<?php echo get_comments_number(); ?>
											</p>
										</div>
									</div>
									<h4 class="card-heading">
										<?php echo get_the_title(); ?>
									</h4>
									<p class="card-title">
										<?php echo get_the_excerpt(); ?>
									</p>
									<div class="blog-btn">
										<a href="<?php echo get_permalink(); ?>" class="btn btn-light">Read-more
											<i class="fa-solid fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
				<?php
					endwhile;
				endif;
				?>
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
// get_sidebar();
get_footer();
