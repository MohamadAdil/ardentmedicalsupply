<?php
/** Template Name: Insurers */
get_header();
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
        <?php
        if (have_rows('banner_section')) {
            while (have_rows('banner_section')) {
                the_row();
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
                $button = get_sub_field('button_url_and_title');
                $button_url = (isset($button['url'])) ? $button['url'] : '';
                $button_title = (isset($button['title'])) ? $button['title'] : '';
                $featured_image_id = get_sub_field('featured_image');
                // var_dump($featured_image_id);
                ?>
                <div class="hero-wrap insurer-wrap" style="background-image: url(<?php echo $featured_image_id['url']; ?>);">
                    <div class="h-txt">
                        <h6 class="fs-14">Ardent Medical Supply</h6>
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
                <?php
            }
        }
        ?>
    </div>
</section>
<section class="we-work">
    <div class="container">
        <div class="we-work-wrap">
            <?php
            if (have_rows('insurance_solutions')) {
                while (have_rows('insurance_solutions')) {
                    the_row();
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $sub_heading = get_sub_field('sub_heading');
                    $button = get_sub_field('button_url_and_title');
                    $button_url = (isset($button['url'])) ? $button['url'] : '';
                    $button_title = (isset($button['title'])) ? $button['title'] : '';
                    ?>
                    <div class="heading">
                        <h2 class="common-h2">
                            <?php echo $heading; ?>
                        </h2>
                        <h4>
                            <?php echo $sub_heading; ?>
                        </h4>
                        <p>
                            <?php echo $description; ?>
                        </p>
                    </div>
                    <div class="we-work-btn">
                        <a href="<?php echo $button_url; ?>" class="btn btn-main" type="button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <?php echo $button_title; ?>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <?php
                }
            }
            ?>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="modal-ul">
                                    <?php
                                    if (have_rows('insurance_plans')) {
                                        while (have_rows('insurance_plans')) {
                                            the_row();
                                            ?>
                                            <li>
                                                <?php echo get_sub_field('insurance_plan_name'); ?>
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
        </div>
    </div>
</section>
<section class="contact-us">
    <div class="container">
        <?php
        if (have_rows('our_order_processing_team')) {
            while (have_rows('our_order_processing_team')) {
                the_row();
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
                $button = get_sub_field('button_url_and_title');
                $button_url = (isset($button['url'])) ? $button['url'] : '';
                $button_title = (isset($button['title'])) ? $button['title'] : '';
                $featured_image_id = get_sub_field('featured_image');
                $image_src = wp_get_attachment_image_src($featured_image_id, 'full');
                ?>
                <div class="contact-wrap" style="background-image: url('<?php echo $image_src[0] ?>');">
                    <div class="h-txt">
                        <h6 class="fs-14">Contact Us</h6>
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
                <?php
            }
        }
        ?>
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
<section class="hassle-free" style="background-color: #445FAB;">
    <div class="container">
        <?php
        if (have_rows('ordering_of_medical_supplies')) {
            while (have_rows('ordering_of_medical_supplies')) {
                the_row();
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
                ?>
                <div class="hassle-free-wrap">
                    <div class="heading">
                        <h2 class="common-h2">
                            <?php echo $heading; ?>
                        </h2>
                        <p>
                            <?php echo $description; ?>
                        </p>
                    </div>
                    <div class="row">
                        <?php
                        if (have_rows('services_provided')) {
                            while (have_rows('services_provided')) {
                                the_row();
                                $title = get_sub_field('title');
                                $content = get_sub_field('content');
                                $featured_image_id = get_sub_field('featured_image');
                                ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="hassle-free-item">
                                        <div class="hassle-free-img">
                                            <?php echo wp_get_attachment_image( $featured_image_id, 'full' ); ?>
                                        </div>
                                        <div class="hassle-free-txt">
                                            <h6><?php echo $title; ?></h6>
                                            <p><?php echo $content; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
        }
        ?>
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