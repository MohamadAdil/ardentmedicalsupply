<?php 
// Template for showing Our Partners Gallery from acf fields.

$our_partners = get_field('our_partners');

if ($our_partners) {
    foreach ($our_partners as $attachment_id) {
        $image_src = wp_get_attachment_image_src($attachment_id, 'full');
        $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);

        // if ($image_src) {
        //     echo '<img src="' . esc_url($image_src[0]) . '" alt="' . esc_attr($image_alt) . '" />';
        // }
    }
}