<?php
/* Template Name: Glossary Of Terms */
get_header();
?>
<Section class="term-condition">
    <div class="container">
        <div class="term-condition-wrap">
            <h2 class="common-h2">
                <?php echo get_field('heading_for_terms_&_conditions'); ?>
            </h2>
            <p class="">
                <?php echo get_field('description_for_terms_&_conditions'); ?>
            </p>
            <ul class="main-term">
                <?php
                if (have_rows('terms_&_conditions')):
                    while (have_rows('terms_&_conditions')):
                        the_row();
                        ?>
                        <li class="main-term-point">
                            <?php echo get_sub_field('title_text');

                            ?>

                            <ul class="term-point">
                                <?php
                                if (have_rows('content')):
                                    while (have_rows('content')):
                                        the_row();
                                        ?>

                                        <li class="term-points">
                                            <?php echo get_sub_field('content_text'); ?>
                                        </li>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                            </ul>
                        </li>
                        <?php
                    endwhile;
                endif;
                ?>
            </ul>
        </div>
    </div>
</Section>
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