<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ardent_Medical_Supply
 */

get_header();
?>

<section class="hero blog-deatils-hero">
	<div class="container">
		<div class="hero-wrap">
			<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
		</div>
	</div>
</section>

<!-- breadcrumb -->
<nav aria-label="blog-deatil breadcrumb">
	<div class="container">
		<ol class="breadcrumb blog-pg">
			<li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?php echo site_url('blog') ?>">Blogs</a></li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo get_the_title(); ?>
			</li>

		</ol>
	</div>
</nav>

<section class="blog-deatils-page">
	<div class="container">
		<h2 class="common-h2">
			<?php echo get_the_title(); ?>
		</h2>
		<div class="card-tp d-flex align-items-center mt-1">
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
			<div class="card-com fourth d-flex align-items-center">
				<!-- <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/share.svg" alt="share"> -->
				<p>
					<?php //echo get_comments_number(); ?>
				</p>
			</div>
		</div>
		<div class="dt-cn">
			<?php
			$i = 1;
			if (have_rows('blog_details')):
				while (have_rows('blog_details')):
					the_row();
					$heading = get_sub_field('heading');
					$description = get_sub_field('description');
					$featured_image = get_sub_field('featured_image');
					if ($i % 2 != 0) {
						?>
						<div class="row align-items-center mb-3">
							<div class="col-lg-7">
								<h4>
									<?php echo $heading; ?>
								</h4>
								<p>
									<?php echo $description; ?>
								</p>
							</div>
							<div class="col-lg-5">
								<figure class="blog-details-img1">
									<?php echo wp_get_attachment_image($featured_image, 'full'); ?>
								</figure>
							</div>
						</div>
						<?php
					} else {
						?>
						<div class="row align-items-center mb-3">
							<div class="col-md-5">
								<h4>
									<?php echo $heading; ?>
								</h4>
								<figure class="blog-details-img2">
									<?php echo wp_get_attachment_image($featured_image, 'full'); ?>

								</figure>
							</div>
							<div class="col-lg-7">
								<p>
									<?php echo $description; ?>
								</p>
							</div>
						</div>
						<?php
					}
					$i++;
				endwhile;
			endif;
			?>
		</div>
</section>

<section class="latest-blogs" style="background-color: #F2F4F5;">
	<div class="container">
		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC',
		);
		$latest_posts_query = new WP_Query($args);
		?>
		<div class="latest-blogs-wrap">
			<h2 class="common-h2">Latest Blogs</h2>
			<div class="row">
				<?php
				if ($latest_posts_query->have_posts()):
					while ($latest_posts_query->have_posts()):
						$latest_posts_query->the_post();
						?>
						<div class="col-lg-4">
							<div class="card-blog card-1">
								<div class="card-image">
									<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
								</div>
								<div class="card-body">
									<div class="card-tp d-flex align-items-center">
										<div class="card-com first d-flex align-items-center">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.svg"
												alt="user">
											<p>
												<?php echo get_the_author(); ?>
											</p>
										</div>
										<div class="card-com second d-flex align-items-center">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg"
												alt="calendar">
											<p>
												<?php echo get_the_date('d M, Y'); ?>
											</p>
										</div>
										<div class="card-com third d-flex align-items-center">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/chat.svg"
												alt="chat">
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
					wp_reset_postdata();
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
get_footer();
?>