<?php
/* Template Name: Breast Pump Online Referrals */
get_header();
?>
<div class="ref-form">
    <section class="hero">
        <div class="container">
            <?php
            if (have_rows('banner_section')) {
                while (have_rows('banner_section')) {
                    the_row();
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $featured_image_id = get_sub_field('featured_image');
                    $image_src = wp_get_attachment_image_src($featured_image_id, 'full');
            ?>
                    <div class="hero-wrap" style="background-image: url('<?php echo $image_src[0]; ?>');">
                        <div class="h-txt">
                            <h6 class="fs-14">Online Referrals</h6>
                            <h1 class="common-h1">
                                <?php echo $heading; ?>
                            </h1>
                            <p>
                                <?php echo $description; ?>
                            </p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
    <section class="form-cnt">
        <div class="container">
            <div class="form-cnt-wrap">
                <div class="heading">
                    <h2 class="common-h2">To refer a patient simply choose one of the following options:</h2>
                    <?php
                    if (have_rows('options_for_refering_patient')) :
                        while (have_rows('options_for_refering_patient')) :
                            the_row('options_for_refering_patient');
                            if (have_rows('options')) {
                                while (have_rows('options')) {
                                    the_row();
                    ?>
                                    <p>
                                        <?php echo get_sub_field('option'); ?>
                                    </p>
                    <?php
                                }
                            }
                        endwhile;
                    endif;
                    ?>
                </div>
                <div class="formm-wrap">
                    <?php echo do_shortcode('[contact-form-7 id="041ce47" title="Breast Pump Online Referral Form"]'); ?>
                </div>
            </div>
        </div>

    </section>
    <section class="our-partners" style="background-color: #445FAB;">
        <div class="container">
            <div class="our-pt-wrap">
                <h2 class="common-h2">Our Partners</h2>
                <ul>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners-1.png" alt="">
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners-2.png" alt="">
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners-3.png" alt="">
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners-4.png" alt="">
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partners-5.png" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
