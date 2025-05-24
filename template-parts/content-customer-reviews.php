<?php
// Template to show customer reviews added by acf fields.

if (have_rows('customers_reviews', 'option')) {
    while (have_rows('customers_reviews', 'option')) {
        the_row();
        $customer_name = get_sub_field('customer_name');
        $review_text = get_sub_field('review_text');
        $customer_designation = get_sub_field('customer_designation');
        $customer_image = get_sub_field('customer_image');
    }
}
?>

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
                                    <?php echo wp_get_attachment_image( $customer_image, 'full' ) ?>

                                </div>
                                <div class="customers-txt">
                                    <p><?php echo $review_text; ?></p>
                                    <h5><?php echo $customer_name; ?></h5>
                                    <h6><?php echo $customer_designation; ?></h6>
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