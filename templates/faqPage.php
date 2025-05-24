<?php
/*Template Name: Faq Page */
get_header();
?>
<section class="faq">
    <div class="container">
        <div class="faq-wrap">
            <h2 class="common-h2">Frequently Asked Questions</h2>
            <div class="accordion" id="accordionExample">
                <?php
                $i = 0;
                if (have_rows('faq')):
                    while (have_rows('faq')):
                        the_row();
                        $i++;
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $i; ?>"
                                    aria-expanded="<?php echo $i === 1 ? 'true' : 'false'; ?>"
                                    aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo get_sub_field('question'); ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $i; ?>"
                                class="accordion-collapse collapse<?php echo $i === 1 ? ' show' : ''; ?>"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php echo get_sub_field('answer'); ?>
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
<?php
get_footer();