<?php
/* Template Name: Patient Page */
get_header();
// Fetching Latest Blogs (3)
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
);
$latest_posts_query = new WP_Query($args);
?>
<section class="hero patient-hero">
    <div class="container">
        <?php
        if (have_rows('banner_section')) :
            while (have_rows('banner_section')) :
                the_row();
                $featured_image_id = get_sub_field('featured_image');
                if ($featured_image_id) {
                    $image_src = wp_get_attachment_image_src($featured_image_id, 'full');
                }
        ?>
                <div class="hero-wrap" style="background-image: url('<?php echo $image_src[0]; ?>');">
                    <div class="h-txt">
                        <h6 class="fs-14">Patients</h6>
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
<section class="orthopedic">
    <div class="container">
        <div class="orthopedic-wrap">
            <?php
            if (have_rows('our_orthopedic_stabilizers')) {
                while (have_rows('our_orthopedic_stabilizers')) {
                    the_row();
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $button = get_sub_field('button_url_and_title');
                    $button_url = (isset($button['url'])) ? $button['url'] : '';
                    $button_title = (isset($button['title'])) ? $button['title'] : '';

            ?>
                    <div class="heading">
                        <div class="lft">
                            <h2 class="common-h2">
                                <?php echo $heading; ?>
                            </h2>
                            <p>
                                <?php echo $description; ?>
                            </p>
                        </div>
                        <div class="orthopedic-btnn">
                            <?php
                            if ($button_url) :
                            ?>
                                <a href="<?php echo $button_url; ?>" class="btn-main">
                                    <?php echo $button_title; ?>
                                </a>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_tag',
                            'field' => 'slug',
                            'terms' => 'braces',
                        ),
                    ),
                );
                $products_query = new WP_Query($args);
                if ($products_query->have_posts()) {
                    while ($products_query->have_posts()) {
                        $products_query->the_post();
                ?>
                        <div class="col-lg-3 col-sm-6 mb-20">
                            <div class="orthopedic-item">
                                <div class="orthopedic-item-img">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                                <div class="orthopedic-item-txt">
                                    <h6><a href="<?php echo get_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a></h6>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="form-txt">
    <div class="container">
        <div class="form-txt-wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="rght-form-txt">
                        <?php
                        if (have_rows('patient_information_form')) :
                            while (have_rows('patient_information_form')) :
                                the_row();
                                $featured_image_id = get_sub_field('featured_image');
                        ?>
                                <h2 class="common-h2">
                                    <?php echo get_sub_field('heading'); ?>
                                </h2>
                                <p>
                                    <?php echo get_sub_field('description'); ?>
                                </p>
                                <?php
                                if ($featured_image_id) :
                                ?>
                                    <figure>
                                        <?php echo wp_get_attachment_image($featured_image_id, 'full'); ?>
                                    </figure>
                        <?php
                                endif;
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php echo do_shortcode('[contact-form-7 id="4372aed" title="Patient’s Information"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="customers">
    <div class="container">
        <div class="customers-wrap">
            <h2 class="common-h2">What Our Customers Say</h2>
            <div class="owl-carousel owl-theme customers-owl">
                <?php

                if (have_rows('customers_reviews', 'option')) {
                    while (have_rows('customers_reviews', 'option')) {
                        the_row();
                        $customer_name = get_sub_field('customer_name');
                        $review_text = get_sub_field('review_text');
                        $customer_designation = get_sub_field('customer_designation');
                        $customer_image = get_sub_field('customer_image');
                ?>
                        <div class="item">
                            <div class="customers-item">
                                <div class="customers-img">
                                    <?php echo wp_get_attachment_image($customer_image, 'full') ?>

                                </div>
                                <div class="customers-txt">
                                    <p>
                                        <?php echo $review_text; ?>
                                    </p>
                                    <h5>
                                        <?php echo $customer_name; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $customer_designation; ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="latest-blogs" style="background-color: #F2F4F5;">
    <div class="container">
        <div class="latest-blogs-wrap">
            <h2 class="common-h2">Latest Blogs</h2>
            <div class="row">
                <?php

                if ($latest_posts_query->have_posts()) {
                    while ($latest_posts_query->have_posts()) {
                        $latest_posts_query->the_post();
                ?>
                        <div class="col-lg-4 col-sm-6">
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
                                        <a href="<?php echo get_permalink(); ?>" class="btn-light">Read-more
                                            <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                    wp_reset_postdata();
                }
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
