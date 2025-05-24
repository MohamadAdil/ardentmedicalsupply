<?php
/* Template Name: Homepage */
get_header();
// To Be Used Later.
// echo do_shortcode('[contact-form-7 id="1d17646" title="Back Braces Online Referrals"]');
// using latest products instead of acf 
// if (have_rows('products_introducing_section')) {
//     while (have_rows('products_introducing_section')) {
//         the_row();
//         $heading = get_sub_field('heading');
//         $description = get_sub_field('description');
//         $button = get_sub_field('button_url_and_title');
//         $button_url = (isset($button['url'])) ? $button['url'] : '';
//         $button_title = (isset($button['title'])) ? $button['title'] : '';
//         $featured_image = get_sub_field('featured_image');
//     }
// }
// Fetching Featured Products
$tax_query[] = array(
    'taxonomy' => 'product_visibility',
    'field' => 'name',
    'terms' => 'featured',
);
$product_query = new WP_Query(
    array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'tax_query' => $tax_query,
    )
);
// Fetching Categories
$uncategorized_term = get_term_by('name', 'Uncategorized', 'product_cat');
$exclude_uncategorized = $uncategorized_term ? array($uncategorized_term->term_id) : array();
$terms = get_terms(
    array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'exclude' => $exclude_uncategorized,
    )
);
// Fetching Latest Blogs (3)
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
);
$latest_posts_query = new WP_Query($args);
?>
<section class="hero">
    <div class="container">
        <div class="hero-wrap">
            <div class="owl-carousel owl-theme banner-owl">
                <?php
                if (have_rows('banner_section')) {
                    while (have_rows('banner_section')) {
                        the_row();
                        $heading = get_sub_field('heading');
                        $description = get_sub_field('description');
                        $button = get_sub_field('button_link_and_title');
                        $button_url = (isset($button['url'])) ? $button['url'] : '';
                        $button_title = (isset($button['title'])) ? $button['title'] : '';
                        $featured_image = get_sub_field('featured_image');
                        ?>
                        <div class="item hero-item">
                            <div class="first-slide">
                                <div class="h-txt">
                                    <h6 class="fs-14">Ardent Medical Supply</h6>
                                    <h1 class="common-h1">
                                        <?php echo $heading; ?>
                                    </h1>
                                    <p class="banner-p">
                                        <?php echo $description; ?>
                                    </p>
                                    <div class="hero-btn">
                                        <?php
                                        if ($button_url):
                                            ?>
                                            <a href="<?php echo $button_url; ?>" class="btn btn-main">
                                                <?php echo $button_title; ?>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                            <?php
                                        endif;
                                        ?>
                                    </div>
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
<div class="hero-fe">
    <div class="container">
        <div class="hero-fe-wrap">
            <div class="row">
                <?php
                if (have_rows('features_provided')) {
                    while (have_rows('features_provided')) {
                        the_row();
                        $heading = get_sub_field('heading');
                        $description = get_sub_field('description');
                        $featured_image_id = get_sub_field('featured_image');
                        ?>
                        <div class="col-lg-3 col-sm-3">
                            <div class="hero-fe-item">
                                <div class="hero-fe-img">
                                    <?php echo wp_get_attachment_image($featured_image_id, 'full'); ?>
                                </div>
                                <div class="hero-fe-txt">
                                    <h6>
                                        <?php echo $heading; ?>
                                    </h6>
                                    <p>
                                        <?php echo $description; ?>
                                    </p>
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
</div>
<section class="featured-products">
    <div class="container">
        <div class="fe-product-wrap">
            <div class="heading">
                <h2 class="common-h2">Featured Products</h2>
                <a href="<?php echo site_url('shop'); ?>">Browse All Product <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="fe-products">
                <div class="row">
                    <div class="col-lg-3">
                        <?php
                        $product_count = 1;
                        if ($product_query->have_posts()) {
                            while ($product_query->have_posts()) {
                                $product_query->the_post();

                                $title = get_the_title();
                                $regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
                                $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);
                                $short_description = get_the_excerpt();
                                $image_id = get_post_thumbnail_id();
                                if ($product_count == 1):
                                    ?>
                                    <div class="full-dt-fe">
                                        <div class="full-dt-fe-img">
                                            <?php echo wp_get_attachment_image($image_id, 'full') ?>
                                        </div>
                                        <div class="full-dt-fe-txt">
                                            <h6>
                                                <?php echo $title; ?>
                                            </h6>
                                            <p>
                                                <?php echo trim_description_keep_tags($short_description, $num_words = 35); ?>
                                            </p>
                                            <div class="center-btns">
                                                <a href="<?php echo esc_url(wc_get_cart_url()) . '?add-to-cart=' . esc_attr($product->get_id()); ?>"
                                                    class="btn btn-main cart-btn"><i class="fa-solid fa-cart-shopping"></i> Add to
                                                    cart</a>
                                                <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="view-btn"><i
                                                        class="fa-regular fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                                $product_count++;
                            }
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <?php
                            $product_count = 1;
                            if ($product_query->have_posts()) {
                                while ($product_query->have_posts()) {
                                    $product_query->the_post();

                                    $title = get_the_title();
                                    $regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
                                    $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);
                                    $short_description = get_the_excerpt();
                                    $image_id = get_post_thumbnail_id();
                                    if ($product_count > 1 && $product_count < 10):
                                        ?>
                                        <div class="col-lg-3 col-sm-4 mb-20">
                                            <div class="full-dt-right-item first">
                                                <div class="full-dt-right-img">
                                                    <?php echo wp_get_attachment_image($image_id, 'full') ?>
                                                    <div class="overlay">
                                                        <div class="icon-pr">
                                                            <a href="<?php echo esc_url(wc_get_cart_url()) . '?add-to-cart=' . esc_attr($product->get_id()); ?>"
                                                                class="icon-1">
                                                                <i class="fa-solid fa-cart-shopping"></i>
                                                            </a>
                                                            <a href="<?php echo esc_url(get_permalink($product_id)); ?>"
                                                                class="icon-2">
                                                                <i class="fa-regular fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="full-dt-right-txt">
                                                    <h6>
                                                        <?php echo $title; ?>
                                                    </h6>
                                                    <p>
                                                        $
                                                        <?php echo $regular_price; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                    $product_count++;
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="introducing">
    <div class="container">
        <div class="introducing-wrap">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $intro_count = 1;
                $product_query = new WP_Query($args);
                if ($product_query->have_posts()) {
                    while ($product_query->have_posts()) {
                        $product_query->the_post();
                        $image_id = get_post_thumbnail_id();
                        if ($intro_count < 2):
                            ?>
                            <div class="col-lg-6 mb-20">
                                <div class="in-old">
                                    <div class="old-txt">
                                        <h6>INTRODUCING</h6>
                                        <h4 class="common-h2">
                                            <?php echo get_the_title(); ?>
                                        </h4>
                                        <p>
                                            <?php echo trim_description_keep_tags(get_the_excerpt(), $num_words = 20); ?>
                                        </p>
                                        <div class="old-btn">
                                            <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="btn btn-main">Shop
                                                Now
                                                <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="old-img">
                                        <?php echo wp_get_attachment_image($image_id, 'full'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endif;
                        $intro_count++;
                    }
                    wp_reset_postdata();
                }
                ?>
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $intro_count = 1;
                $product_query = new WP_Query($args);
                if ($product_query->have_posts()) {
                    while ($product_query->have_posts()) {
                        $product_query->the_post();
                        $image_id = get_post_thumbnail_id();
                        if ($intro_count > 1):
                            ?>
                            <div class="col-lg-6">
                                <div class="in-new black">
                                    <div class="new-txt">
                                        <h6>INTRODUCING NEW</h6>
                                        <h4 class="common-h2">
                                            <?php echo get_the_title(); ?>
                                        </h4>
                                        <p>
                                            <?php echo trim_description_keep_tags(get_the_excerpt(), $num_words = 20); ?>
                                        </p>
                                        <div class="new-btn">
                                            <a href="<?php echo esc_url(get_permalink($product_id)); ?>" class="btn btn-main">Shop
                                                Now
                                                <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="new-img">
                                        <!-- <img src="./images/introducing-new.png" alt="introducing-new"> -->
                                        <?php echo wp_get_attachment_image($image_id, 'full'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endif;
                        $intro_count++;
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </div>
</div>
<section class="category">
    <div class="container">
        <div class="category-wrap">
            <div class="owl-carousel owl-theme cate-car">
                <?php
                if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        $term_id = $term->term_id;
                        $term_name = $term->name;
                        $term_thumbnail_id = get_term_meta($term_id, 'thumbnail_id', true);
                        ?>
                        <div class="item">
                            <div class="cate-item">
                                <div class="cate-img">
                                    <!-- <img src="./images/categoty-1.png" alt="bathroom-safety"> -->
                                    <?php echo wp_get_attachment_image($term_thumbnail_id, 'full'); ?>
                                </div>
                                <div class="cate-txt">
                                    <h4>
                                        <?php echo $term_name; ?>
                                    </h4>
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
<section class="insurers">
    <div class="container">
        <div class="insurers-wrap" style="
            background-image: url('http://49.249.236.30:2425/ardentmedicalsupply/wp-content/uploads/2024/03/insurers-1.png');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            padding: 120px 55px;">
            <?php
            if (have_rows('insurers_section')) {
                while (have_rows('insurers_section')) {
                    the_row();
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $button = get_sub_field('button_url_and_title');
                    $button_url = (isset($button['url'])) ? $button['url'] : '';
                    $button_title = (isset($button['title'])) ? $button['title'] : '';
                    $featured_image = get_sub_field('featured_image');
                    ?>
                    <div class="h-txt">
                        <h6 class="fs-14">Insurers</h6>
                        <h1 class="common-h1">
                            <?php echo $heading; ?>
                        </h1>
                        <p>
                            <?php echo $description; ?>
                        </p>
                        <div class="insurers-btn">
                            <?php
                            if ($button_url):
                                ?>
                                <a href="<?php echo site_url('insurers'); ?>" class="btn btn-main">Read More
                                    <i class="fa-solid fa-arrow-right"></i></a>
                                <?php
                            endif;
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
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
                                    <!-- <img src="./images/customer-1.png" alt="customer"> -->
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