<?php
/*Template Name: Contact */
get_header();
//echo do_shortcode('[contact-form-7 id="c025598" title="Contact Us"]');
?>
<section class="form-txt py-5 contact-pg">
    <div class="container">
        <div class="form-txt-wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="rght-form-txt">
                        <div class="add-dt">
                            <h2 class="common-h2"> We're here to Help </h2>
                            <p>
                                Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                                Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </p>
                            <div class="cn-dtll">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Ardent Medical Supply Inc. 1328 Nostrand Avenue Brooklyn, New York 11226</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul>
                                            <li class="mb-2"><span>Phone:</span>
                                                <a href="tel:+1-202-555-0104">+1-202-555-0104</a>
                                            </li>
                                            <li class="mb-2">
                                                <span>E-Mail:</span>
                                                <a href="mailto:info@ardentmedicalsupply.com">info@ardentmedicalsupply.com</a>
                                            </li>
                                            <li class="mb-2"> <span>Hours:</span>
                                                Mon-Fri, 8am - 5pm, EST</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="common-h2 mb-4">Contact Form</h2>
                    <?php echo do_shortcode( '[contact-form-7 id="c025598" title="Contact Us"]' ); ?>
                    <!-- <div class="row formmm">
                        <div class="col-md-12">
                            <p><label> First Name <span class="wpcf7-form-control-wrap" data-name="text-264"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required patient-information-form" id="first-name" aria-required="true" aria-invalid="false" value="" type="text" name="text-264"></span><br>
                                </label>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p><label> Last Name <span class="wpcf7-form-control-wrap" data-name="text-799"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required patient-information-form" id="last-name" aria-required="true" aria-invalid="false" value="" type="text" name="text-799"></span><br>
                                </label>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><label> State<br>
                                    <span class="wpcf7-form-control-wrap" data-name="menu-921">
                                        <select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required ardental-medical-supply-patient-info-form" id="ardental-medical-supply-interrested-options" aria-required="true" aria-invalid="false" name="menu-921">
                                            <option value="">—Please choose an option—</option>
                                            <option value="Back Brace">Back Brace</option>
                                            <option value="Knee Brace">Knee Brace</option>
                                            <option value="Extremity Brace">Extremity Brace</option>
                                        </select></span> </label>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><label> Zip Code <span class="wpcf7-form-control-wrap" data-name="number-340"><input class="wpcf7-form-control wpcf7-number wpcf7-validates-as-required wpcf7-validates-as-number patient-information-form" id="patient-zipcode" aria-required="true" aria-invalid="false" value="" type="number" name="number-340"></span><br>
                                </label>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p><label> Email Address <span class="wpcf7-form-control-wrap" data-name="email-692"><input size="40" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email patient-information-form" id="patient-email" aria-required="true" aria-invalid="false" value="" type="email" name="email-692"></span><br>
                                </label>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p><label> Phone Number <span class="wpcf7-form-control-wrap" data-name="tel-569"><input size="40" class="wpcf7-form-control wpcf7-tel wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-tel patient-information-form" id="patient-number" aria-required="true" aria-invalid="false" value="" type="tel" name="tel-569"></span><br>
                                </label>
                            </p>
                        </div>

                        <div class="col-md-12">
                            <p><label>Which of these options best describes you?*<br>
                                    <span class="wpcf7-form-control-wrap" data-name="menu-921"><select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required ardental-medical-supply-patient-info-form" id="ardental-medical-supply-interrested-options" aria-required="true" aria-invalid="false" name="menu-921">
                                            <option value="">—Please choose an option—</option>
                                            <option value="Back Brace">Back Brace</option>
                                            <option value="Knee Brace">Knee Brace</option>
                                            <option value="Extremity Brace">Extremity Brace</option>
                                        </select></span> </label>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p><label>Why are you contacting us today?*<br>
                                    <span class="wpcf7-form-control-wrap" data-name="menu-920"><select class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required patient-information-form" id="describes-you-patient-information-form" aria-required="true" aria-invalid="false" name="menu-920">
                                            <option value="">—Please choose an option—</option>
                                            <option value="Medicare Beneficiary">Medicare Beneficiary</option>
                                            <option value="Caregiver">Caregiver</option>
                                            <option value="Medical Provider Office">Medical Provider Office</option>
                                            <option value="Other">Other</option>
                                        </select></span> </label>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p><label> How can we help you?*<br>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> </label>
                            </p>
                        </div>
                        <div class="col-md-12 btn-form">
                            <p><input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit" value="Submit"><span class="wpcf7-spinner"></span>
                            </p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
