<?php
/* Template Name: Online Referral Page */
get_header();

if (have_rows('banner_section')) {
    while (have_rows('banner_section')) {
        the_row();
        $heading = get_sub_field('heading');
        $description = get_sub_field('description');
        $featured_image = get_sub_field('featured_image');
    }
}

$option_heading = get_field('option_heading');

if (have_rows('referral_options')) {
    while (have_rows('referral_options')) {
        the_row();
        $referal_option = get_sub_field('referal_option');
    }
}
?>

<?php
get_footer();